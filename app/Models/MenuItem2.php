<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem2 extends Model
{
    use HasFactory;

    protected $table = 'menu_items_2';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'status',
    ];
}
