<?php

namespace App\Traits;

//use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\throwException;

trait PeriodTrait
{
    /**
     * @throws Exception
     */
    public function getPeriodFromDb($minutes): string
    {
        if(strlen($minutes) !== 2 && strlen($minutes) !== 3)
        {
            throw new Exception('Wrong minutes length');
        }

        if (strlen($minutes) === 2) {
            $minutes = '0,' . $minutes;
        } else {
            $minutes = substr($minutes, 0, 1) . ',' . substr($minutes, -2);
        }
        return $minutes;
    }

    public function getRandomPeriodForFactory(): string
    {
        $value = rand(1, 75);

        $afterComma = match (true) {
            $value === 0 => '00',
            $value > 0 && $value <= 25 => 25,
            $value > 25 && $value <= 50 => 50,
            $value > 50 && $value <= 75 => 75,
        };

        return rand(1, 9) . $afterComma;
    }

    public function getPeriodForDb(&$data)
    {
        if (str_contains($data['period'], 'h')) {

            $periodArray = explode('h ', substr($data['period'], 0, -1));

            $periodRounded = match (true) {
                $periodArray[1] === '00' => '00',
                $periodArray[1] > 0 && $periodArray[1] <= '15' => '25',
                $periodArray[1] > 15 && $periodArray[1] <= '30' => '50',
                $periodArray[1] > 30 && $periodArray[1] <= '45' => '75',
                $periodArray[1] > 45 => '100',
            };

            if ($periodRounded === '100') {
                $periodArray[0]++;
                $periodRounded = '00';
            }

            $data['minutes'] = $periodArray[0] . $periodRounded;
        } else {
            if (str_contains($data['period'], ',')) {
                $data['minutes'] = str_replace(',', '', $data['period']);
            } else {
                $data['minutes'] = $data['period'] . '00';
            }
        }
    }
}
