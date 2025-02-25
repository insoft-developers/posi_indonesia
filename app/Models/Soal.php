<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Bus;

class Soal extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function competition():BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id','id');
    }

    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id','id');
    }

    public function study():BelongsTo
    {
        return $this->belongsTo(Study::class, 'study_id','id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id','id');
    }
}
