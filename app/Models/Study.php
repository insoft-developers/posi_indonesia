<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Study extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function competition() : BelongsTo 
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }

    public function pelajaran() : BelongsTo 
    {
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id', 'id');
    }

    public function level() : BelongsTo 
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function cart() : HasOne
    {
        return $this->hasOne(Cart::class, 'study_id', 'id');
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class, 'study_id','id');
    }

    public function trans(): HasMany
    {
        return $this->hasMany(Transaction::class, 'study_id','id');
    }
}
