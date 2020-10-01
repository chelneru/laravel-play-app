<?php

namespace App\Imports;

use app\models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (count($row) == 4) {
            $type = null;
            //decide type
            if (isset($row[3]) && is_float($row[3])) {
                //we have a valid numeric value
                if ($row[3] > 0) {
                    $type = Transaction::EARNING;
                } else {
                    $type = Transaction::PAYMENT;
                }
            } else {
                $type = 0;
            }

            return new Transaction([
                'type' => $type,
                'author' => 1,
                'time' => strtotime($row[0]),
                'title' => $row[2],
                'budget' => floatval($row[4]),
                'value'=> floatval($row[3]),
            ]);
        } else {
            return null;
        }
    }
}
