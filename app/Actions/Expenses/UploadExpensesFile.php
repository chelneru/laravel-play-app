<?php


namespace App\Actions\Expenses;
use ParseCsv\Csv;

class UploadExpensesFile
{

    public static function parse($file) {
        $csv = new Csv();
        $csv->encoding('UTF-16', 'UTF-8');
        $csv->delimiter = ";";
        $csv->parse($file);
//        print_r();
        dd($csv->data[0]);
    }
}
