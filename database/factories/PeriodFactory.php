<?php

namespace Database\Factories;

use App\Models\Period;
use App\Models\Project;
use App\Models\Traits\PeriodTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    use PeriodTrait;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $check = true;
        $date = $this->faker->dateTimeBetween('-5 years')->format('Y-m-d');
        $projectId = $this->faker->randomElement(Project::all()->pluck('id')->toArray());
        while ($check === true) {
            Log::debug('PeriodFactory@definition check $date and $projectId', [$date, $projectId]);
            $check = Period::where([
                ['date', '=', $date],
                ['project_id', '=', $projectId],
            ])->exists();
        }

        Log::debug('PeriodFactory@definition insert $date and $projectId', [$date, $projectId]);

        return [
            'date' => $date,
            'minutes' => $this->getRandomPeriodForFactory(),
            'reported' => $this->faker->boolean(),
            'project_id' => $projectId,
            'user_id' => rand(2, 4),
        ];
    }
}
