<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCompetition extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function competition():BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
}
