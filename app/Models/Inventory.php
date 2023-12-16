<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'id',
        'ing_title',
        'ing_desc',
        'ing_qty',
    ];
}
