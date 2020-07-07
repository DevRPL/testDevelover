<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    protected $table = 'products';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
