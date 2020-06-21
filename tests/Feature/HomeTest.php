<?php

namespace Tests\Feature;

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
