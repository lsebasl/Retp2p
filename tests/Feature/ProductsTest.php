<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    Public Function testNoAuthenticatedUserCantAccessToProductCreate()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }

}
