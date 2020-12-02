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

class ProductsApiTest extends TestCase
{
    use RefreshDatabase;

 
    public function no_authenticated_api_admin_cannot_access_to_products_list()
    {

        $user = factory(User::class)->create(['role' => User::USER_ROLE]);

        $product =  factory(Product::class)->create();

        $response = $this->json('GET','/api/products');

        $response->assertStatus(401);

    }

    /**
     * @test
     */
    public function api_admin_can_products_list()
    {
        $this->withoutMiddleware();

        $user = factory(User::class)->create(['role' => User::ADMIN_ROLE]);

        $this->actingAs($user,'api');

        $product =  factory(Product::class)->create();

        $response = $this->json('GET','/api/products');

        $response->assertStatus(200);

    }

    /**
     * @test
     */
    public function api_admin_can_create_products()
    {

        $this->withoutMiddleware();

        $user = factory(User::class)->create(['role' => User::ADMIN_ROLE]);
        $category = factory(Category::class)->create(['id' => 1,'name'=>'Mobiles' ]);

        Storage::fake('image');

        $file = uploadedfile::fake()->image('product.jpg');

        $this->actingAs($user,'api');

        $response = $this->json('POST','/api/products',$this->getValidData($file));

        $response->assertStatus(201);

    }

    /**
     * @test
     */
    public function api_admin_can_update_products()
    {

        $this->withoutMiddleware();

        $user = factory(User::class)->create(['role' => User::ADMIN_ROLE]);

        $category = factory(Category::class)->create(['id' => 1,'name'=>'Mobiles']);

        $product = factory(Product::class)->create(['id' => 2,'category_id' => 1,]);

        Storage::fake('image');

        $file = uploadedfile::fake()->image('product.jpg');

        $data = $this->getValidData($file);

        $this->actingAs($user,'api');

        $response = $this->json('PUT','/api/products/2',$data);

        $response->assertStatus(201);

    }

    /**
     * @test
     */
    public function api_admin_can_delete_products()
    {
        $this->withoutMiddleware();

        $product = factory(Product::class)->create(['id' => 1]);

        $admin = factory(User::class)->create();

        $response = $this->actingAs($admin)->json('DELETE','/api/products/1');

        $response->assertStatus(200);

    }

    /**
     * @param \Illuminate\Http\Testing\File $file
     * @return array
     */
    public function getValidData(\Illuminate\Http\Testing\File $file): array
    {
        $data = [

            'image' => $file,
            'barcode' => '70440244123',
            'name' => 'Huawei',
            'category_id' => 1,
            'model' => 'p123',
            'mark' => 'Huawei',
            'description' => 'Verde',
            'units' => '5',
            'price' => '200',
            'discount' => '10',
            'status' => 'Enable',

        ];
        return $data;
    }

}
