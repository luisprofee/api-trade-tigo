<?php

namespace App\Imports;

use App\Models\Tests;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class TestsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tests([
            'region' => $row['region'],
            'bu' => $row['bu'],
            'clase' => $row['clase'],
            'vertical' => $row['vertical'],
            'segmento' => $row['segmento'],
            'canal' => $row['canal'],
            'valor' => $row['valor'],
            'mes' => $row['mes'],
            'anio' => $row['anio'],
        ]);
    }
}