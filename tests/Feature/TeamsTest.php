<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    // if you are doing a test of interacting with the database, always use this
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_team()
    {
        // Given I am the user who is logged in
        $this -> actingAs( factory('App\User')->create() );

        // When they hit the endpoint /teams to create a new team, while passing the necessary data
        $this -> post('/teams', [
            'name' => 'Acme'
        ]);

        // Then there should be a new team in the database
        $this -> assertDatabaseHas('teams', ['name' => 'Acme']);
    }
}
