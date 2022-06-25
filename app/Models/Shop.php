<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User(){
        return $this->hasMany(User::class);
    }
    public function Products(){
        return $this->hasMany(Product::class);
    }
    public function Sales(){
        return $this->hasMany(Sale::class);
    }
}
