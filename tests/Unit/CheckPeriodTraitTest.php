<?php

use App\Models\Traits\PeriodTrait;

uses(PeriodTrait::class);

test('get periods for db', function () {

    $testData = [
        [
            'input' => '4h 23m',
            'assert' => 450,
            'assert2' => '4,50',
        ],
        [
            'input' => '0h 23m',
            'assert' => 50,
            'assert2' => '0,50',
        ],
        [
            'input' => '4h 59m',
            'assert' => 500,
            'assert2' => '5,00',
        ],
        [
            'input' => '4,25',
            'assert' => 425,
            'assert2' => '4,25',
        ],
        [
            'input' => '3',
            'assert' => 300,
            'assert2' => '3,00',
        ],
        [
            'input' => '1,50',
            'assert' => 150,
            'assert2' => '1,50',
        ],
        [
            'input' => '0,75',
            'assert' => 75,
            'assert2' => '0,75',
        ],
    ];

    foreach ($testData as $period) {
        $data['period'] = $period['input'];

        $this->getPeriodForDb($data);

        expect((int) $data['minutes'])->toBe($period['assert'])
            ->and($this->getPeriodFromDb((int) $data['minutes']))->toBe($period['assert2']);

    }
});
