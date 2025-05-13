<?php

namespace App\Models;

use App\Traits\PeriodTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Period extends Model
{
    use PeriodTrait;

    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = [
        'date',
        'minutes',
        'reported',
        'project_id',
        'user_id',
    ];
    // add guarded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
