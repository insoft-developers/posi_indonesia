<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamSession extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function competition() : BelongsTo {
        return $this->belongsTo(Competition::class, 'competition_id','id');
    }

    public function study() : BelongsTo {
        return $this->belongsTo(Study::class, 'study_id','id');
    }

}
