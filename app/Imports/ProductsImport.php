<?php

namespace App\Imports;

use App\Models\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row['malzeme_adi'],
            'waybill_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['irsaliye_tarihi']))->toDateString(),
            'waybill_number' => $row['irsaliye_no'],
            'invoice_date' => Carbon::parse($row['fatura_tarihi']),
            'bill_number' => $row['fatura_no'],
            'movement_direction' => $row['hareket_yonu'],
            'dispatch_place' => $row['sevk_yeri'],
            'unit' => $row['birim'],
            'output_quantity' => $row['cikis_miktar']
        ]);
    }

    
}
