<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_home_view()
    {
        $this->get(route('home'))
            ->assertRedirect(route('login'));
    }

}
