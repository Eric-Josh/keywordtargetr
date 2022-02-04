<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Languages;
use \Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeywordExport;

class KeywordController extends Controller
{
    public function index()
    {
        $languages = Languages::all();

        return view('search', compact('languages'));
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

    public function saveList(Request $request)
    {

    }

    public function showList()
    {
        
    }
}
