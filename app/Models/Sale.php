<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
    public function Shop(){
        return $this->belongsTo(Shop::class);
    }

}
