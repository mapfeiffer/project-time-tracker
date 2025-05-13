<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = ['name'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function periods(): HasMany
    {
        return $this->hasMany(Period::class);
    }

    /**
     * Get the periods by year month (example: 2025-01) for the project.
     */
    public function periodsByYearAndMonth($yearAndMonth): Collection
    {
        //        Log::debug('Project@periodsByYearAndMonth $yearAndMonth', [
        //            $yearAndMonth,
        //            $this->hasMany(Period::class)
        //            ->where('date', 'Like', $yearAndMonth . '%')->count(),
        //        ]);

        return $this->hasMany(Period::class)
            ->where('date', 'Like', $yearAndMonth . '%')->get();
    }

    /**
     * Get the summary by year month (example: 2025-01) or all in total for the project.
     */
    public function getSummary(string|bool $yearAndMonth = false): string
    {
        if ($yearAndMonth === false) {
            $minutes = $this->periods()->sum('minutes');
        } else {
            $minutes = $this->periodsByYearAndMonth($yearAndMonth)->sum('minutes');
        }
        $result = substr($minutes, 0, -2) . ',' . substr($minutes, -2);
        return $result !== ',0' ? $result : 0;
    }
}
