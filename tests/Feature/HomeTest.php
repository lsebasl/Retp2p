<?php

namespace Tests\Feature;

use Tests\TestCase;


class HomeTest extends TestCase
{
    /** @test*/

    public function testNoAuthenticatedUserCantAccessToHome()
    {
        $this->get(route('home'))
            ->assertRedirect(route('login'));
    }

}
