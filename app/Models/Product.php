<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'jenis', 
        'deskripsi',
        'foto',
        'stok',
        'category_id' 
    ];

    // Definisikan relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
