<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(order::class , 'id','order_id');
    }
    public function product()
    {
        return $this->hasOne(product::class , 'id','product_id');
    }
}
