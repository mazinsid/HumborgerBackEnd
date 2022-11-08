<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'item_id',
    ];

    public function Items()
    {
        return $this->hasMany(Item::class);
    }
}
