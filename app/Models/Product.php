<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = ['product_name', 'waybill_date', 'waybill_number', 'invoice_date', 'bill_number', 'movement_direction', 'dispatch_place', 'unit', 'output_quantity'];
}
