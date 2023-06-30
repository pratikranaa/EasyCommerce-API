<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content',
        'rating',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
