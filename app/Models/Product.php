<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'store_id'
    ];

    /**
     * Get the Store that owns the Product.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
