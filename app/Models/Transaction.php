<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function competition():BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id','id');
    } 

    public function study(): BelongsTo
    {
        return $this->belongsTo(Study::class, 'study_id','id');
    }

    public function invoices():BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id','id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function tuser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userid','id');
    }

   
}

