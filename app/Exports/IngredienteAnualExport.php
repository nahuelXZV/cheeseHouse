<?php

namespace App\Exports;

use App\Models\Ingrediente;
use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IngredienteAnualExport implements FromCollection, WithHeadings
{
    protected $encabezado;

    public function headings(): array
    {
        return $this->encabezado;
    }

    public function __construct()
    {
        $this->encabezado = [
            'ID',
            'Nombre',
            'Unidad',
            'Stock',
            'Precio por Unidad',
            'Stock Mínimo',
            'Stock Máximo',
            'Descripción',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    public function collection()
    {
        return Ingrediente::select(
            'id',
            'nombre',
            'unidad',
            'stock',
            'precio_unidad',
            'stock_minimo',
            'stock_maximo',
            'descripcion',
            'created_at',
            'updated_at'
        )->whereYear('created_at', '=', date('Y'))->get();
    }
}
