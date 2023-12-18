<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_line extends Model
{
    use HasFactory;

    protected $table = 'order_line';

    protected $fillable = [
        'beli',
        'foods',
        'nama_penerima',
        'alamat',
        'subtotal',
    ];
}
