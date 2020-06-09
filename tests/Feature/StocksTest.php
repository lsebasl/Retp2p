<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StocksTest extends TestCase
{
    Public Function testNoAuthenticatedUserCantAccessToProductCreate()
    {
        $this->get(route('stocks.index'))
            ->assertRedirect(route('login'));

    }
}
