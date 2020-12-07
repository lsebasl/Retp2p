<?php

namespace Tests\Feature\Api;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UsersApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function api_admin_can_sign_up_a_user()
    {

        $this->withoutMiddleware();

        $user = factory(User::class)->create(['role' => User::ADMIN_ROLE]);

        $this->actingAs($user, 'api');

        $data = [
            'name'=> 'Joan',
            'last_name' => 'Baron',
            'id_type'=> 'Card ID',
            'identification'=> 101722823122,
            'phone'=> 3172798026,
            'email'=> "isebasi3@hotmail.com",
            'address' => 'CR 85 # 19 A 48',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];

        $response = $this->json('POST', 'api/auth/signup', $data);

        $response->assertStatus(201);

    }


}
