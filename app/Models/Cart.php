<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function competition() : BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function study() : BelongsTo 
    {
        return $this->belongsTo(Study::class, 'study_id','id');
    }

    public function product(): BelongsTo 
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function pemesan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer', 'id');
    }
}
