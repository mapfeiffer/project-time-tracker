<?php

namespace Tests\Browser;

use App\Models\Period;
use App\Models\Project;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_login_page(): void
    {
        Project::factory(10)->create();
        Period::factory(100)->create();

        $this->browse(function (Browser $browser) {
            $browser
                ->visit("/login")
                ->loginAs(User::find(1))
                ->assertSee("TimeTracker")
                ->assertSee("Email address")
                ->assertSee("Password")
                ->press("Sign in");
        });

        //$this->assertDatabaseHas('sessions', ['user_id' => 1]);
    }
}
