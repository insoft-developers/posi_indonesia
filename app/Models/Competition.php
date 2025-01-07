<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function levels(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level','id');
    }

    public function transaction():HasMany
    {
        return $this->hasMany(Transaction::class, 'competition_id','id');
    }

    public function study() : hasMany
    {
        return $this->hasMany(Study::class, 'competition_id', 'id');
    }
}
