<?php

use App\Models\Period;
use App\Models\Project;
use App\Models\User;
//use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

//uses(DatabaseTruncation::class);

test('Test login page', function () {

    Project::factory(10)->create();
    Period::factory(100)->create();

    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->loginAs(User::find(1))
            ->assertSee('TimeTracker')
            ->assertSee('Email address')
            ->assertSee('Password')
            ->press('Sign in');
    });

    $this->assertDatabaseHas('sessions', ['user_id' => 1]);
});


