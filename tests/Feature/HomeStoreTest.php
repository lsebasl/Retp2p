<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeStoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_home_store_view()
    {
        $this->get(route('home.store'))
            //->assertStatus(200)
            ->assertSee('Project');
    }

}
