<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'price',
    ];
    public function manfacturer()
    {
        return $this->hasMany(manfacturer::class , 'id','manfacturer_id');
    }
    public function categroy()
    {
        return $this->belongsTo(categroy::class , 'id','categroy_id');
    }
    public function orderitem()
    {
        return $this->belongsToMany(Orderitem::class);
    }
}
