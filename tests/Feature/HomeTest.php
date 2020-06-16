<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class HomeTest extends TestCase
{
    /** @test*/

    Function testNoAuthenticatedUserCantAccessToHome()
    {
        $this->get(route('home'))
            ->assertRedirect(route('login'));
    }

}
