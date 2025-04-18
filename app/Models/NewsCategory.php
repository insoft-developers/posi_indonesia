<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function berita():HasMany
    {
        return $this->hasMany(Berita::class, 'category', 'slug');
    }
}
