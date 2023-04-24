<?php

namespace App\Imports;

use App\Models\productos;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new productos([

            'idProducto' => $row[0],
            'Descripcion' => $row[1],
            'Precio' => $row[2],


            //
        ]);
    }
}