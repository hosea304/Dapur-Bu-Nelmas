<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function food(): HasOne
    {
        return $this->hasOne(Foods::class, "id", "foods");
    }
}
