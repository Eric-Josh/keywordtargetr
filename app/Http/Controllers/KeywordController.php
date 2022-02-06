<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Languages;
use App\Models\SavedList;
use App\Models\SavedListTransaction;
use \Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeywordExport;

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
        $request->validate([$request->listName => 'unique:kt_list']);

        $list = SavedList::create(['name' => $request->listName]);

        return response()->json([
            'listId' => $list->id,
            'listName' => $list->name
        ]);
    }

    public function saveList(Request $request)
    {
        SavedListTransaction::create([
            'list_id' => $request->listId,
            'provider' => $request->provider,
            'keyword' => $request->keywordData,
            'language_code' => $request->langCode
        ]);

        return response()->json([
            'status' => 'keyword(s) added to list',
        ]);
    }

    public function showList()
    {
        
    }
}
