<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ([
        'user_id',
        'menu_id',
        'order_date',
        'qty',
        'total_price',
        'order_status',
    ]);
}
