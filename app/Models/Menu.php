<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable =[
        'id',
        'menu_title',
        'menu_description',
        'menu_price',
        'menu_cat',
        'menu_image',
        'menu_status',
        'event_id',
    ];
}
