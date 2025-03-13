<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }


    public function kategori(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category', 'slug');
    }
}
