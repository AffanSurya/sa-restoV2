<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem1 extends Model
{
    use HasFactory;

    protected $table = 'menu_items_1';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'status',
    ];

    // Orm relation
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'menu_item_id', 'id');
    }
}
