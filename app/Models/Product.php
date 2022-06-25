<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Store(){
        return $this->belongsTo(Store::class);
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Property(){
        return $this->belongsTo('App\Models\Property');
    }
    public function Shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
