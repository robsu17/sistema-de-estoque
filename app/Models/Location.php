<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
