<?php

namespace App\Models;

use App\Models\Scopes\PeriodUserScope;
use App\Models\Traits\PeriodTrait;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([PeriodUserScope::class])]
class Period extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    use PeriodTrait;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'minutes',
        'reported',
        'project_id',
        'user_id',
    ];

    /**
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * @var array<int, string>
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
