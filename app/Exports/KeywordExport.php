<?php

namespace App\Exports;

use App\Models\Keyword;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeywordExport implements FromCollection
{
    public function __construct($keywords)
    {
        $this->keywords = $keywords;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $keyObj = [];
        foreach($this->keywords as $keyword){
            $keyObj[] = array('keyword' => $keyword);
        }
        return collect($keyObj);
    }
}
