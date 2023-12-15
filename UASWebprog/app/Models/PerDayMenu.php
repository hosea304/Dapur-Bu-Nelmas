<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PerDayMenu extends Model
{
    use HasFactory;
    protected $table = 'per_day_menu';
    protected $fillable = [
        'food_id',
        'date',
    ];

    public function food(): HasOne
    {
        return $this->hasOne(Foods::class, "id", "food_id");
    }
}
