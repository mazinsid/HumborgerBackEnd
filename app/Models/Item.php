<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rating',
        'price',
        'isTopOfTheWeek',
        'image',
        'size',
        'category_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
