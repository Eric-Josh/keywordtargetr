<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Languages;
use App\Models\SavedList;
use App\Models\SavedListTransaction;
use \Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeywordExport;
use DB;

class KeywordController extends Controller
{
    public function index()
    {
        $languages = Languages::all();
        $lists = SavedList::all();

        return view('search', compact('languages','lists'));
    }

    public function search(Request $request)
    {
        return redirect()->route('search', [
            'q' => $request->keyword, 
            'language' => $request->language,
            'provider' => $request->provider,
        ]);
    }

    public function csvExport(Request $request)
    {
        $dataExport = $request->dataExport;
        $fileName   = Carbon::now().'.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('Keyword(s)');

        $callback = function() use($dataExport, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($dataExport as $task) {
                $row['Keyword']  = $task;

                fputcsv($file, array($row['Keyword']));
            }
            fclose($file);
        };

        return response()->streamDownload($callback, 200, $headers);
    }

    public function excelExport(Request $request)
    {
        $dataExport = $request->dataExport;

        return Excel::download(new KeywordExport($dataExport), 'keywords.xlsx');
    }

    public function newList(Request $request)
    {
        $list = SavedList::create(['name' => $request->listName]);

        return response()->json([
            'listId' => $list->id,
            'listName' => $list->name
        ]);
    }

    public function newListPost(Request $request)
    {
        $request->validate([ 'name' => ['required','unique:kt_list']]);

        SavedList::create(['name' => $request->name]);

        return redirect()->route('list.show')->withStatus('List Created!');
    }

    public function updateList(Request $request, $id)
    {
        $list = SavedList::findOrFail($id);

        $list->update(['name' => $request->name]);

        return redirect()->route('list.show')->withStatus('List Updated!');
    }

    public function destroyList($id)
    {
        $list = SavedList::findOrFail($id);
        $listTrans = SavedListTransaction::where('list_id', $id);

        $listTrans->delete();
        $list->delete();

        return redirect()->route('list.show')->withStatus('List Deleted!');
    }

    public function saveKeyword(Request $request)
    {
        foreach($request->keywordData as $keyword){
            SavedListTransaction::create([
                'list_id' => $request->listId,
                'provider' => $request->provider,
                'keyword' => $keyword,
                'language_code' => $request->langCode
            ]);
        }
        
        return response()->json([
            'status' => 'keyword(s) added to list',
        ]);
    }

    public function showList(Request $request)
    {
        $listSearch = request()->query('list_search');

        if(isset($listSearch)){
            $lists = DB::select(DB::raw("select l.id, l.name, count(lt.list_id) as total from kt_list l 
                left join kt_list_transactions lt on l.id=lt.list_id
                where l.name like '%".$listSearch."%'
                group by 1,2 order by l.created_at desc "));
        }else{
            $lists = DB::select(DB::raw('select l.id, l.name, count(lt.list_id) as total from kt_list l left join kt_list_transactions lt on l.id=lt.list_id
            group by 1,2 order by l.created_at desc'));
        }
        return view('lists', compact('lists'));
    }

    public function listKeyword($id)
    {
        $list = SavedList::where('id', $id)->first();
        $keywords = SavedListTransaction::where('list_id', $id)->paginate(20);

        return view('list-keyword', compact('keywords','list'));
    }
}
