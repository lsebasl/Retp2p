<?php


namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeStoreTest extends TestCase
{
    /** @test*/

    public function testUserCanSeeHomeStoreView()
    {
        $this->get(route('home.store'))
             ->assertStatus(200)
             ->assertSee('Project');
    }

}
