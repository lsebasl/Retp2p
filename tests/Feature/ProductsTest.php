<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class ProductsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function no_authenticated_user_cant_access_to_view_product_index()
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function no_authenticated_user_cant_access_to_view_product_create()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }
    /** @test */
    public function no_authenticated_user_cant_create_product()
    {
        $this->actingAs($user = $this->createUser());

        $this->post('products',['name' => '',
            'barcode' => '70024411 ',
            'category' => 'Mobiles',
            'model' => 'p123',
            'mark' => 'Huawei',
            'description' => 'Verde',
            'units' => '5',
            'price' => '200',
            'discount' => '10',
            'status' => 'Enable',]);

        $this->assertDatabaseEmpty('products');


    }

    /** @test */
    public function no_authenticated_user_cant_access_to_view_product_show()
    {
        $product = factory(Product::class)->create();

        $this->get(route('products.show', $product))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function no_authenticated_user_cant_access_to_view_product_edit()
    {
        $Product = factory(Product::class)->create();

        $this->get(route('products.edit', $Product))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function no_authenticated_user_cant_access_to_product_update()
    {
        $Product = factory(Product::class)->create();

        $this->put(route('products.update', $Product))
            ->assertRedirect(route('login'));

    }

    /** @test */
    public function no_authenticated_user_cant_access_to_product_delete()
    {
        $product = factory(Product::class)->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('login'));

    }


    /** @test */
    public function it_show_if_product_list_is_empty()

    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('users.index'));

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('Without Products')
            ->assertOk();
    }
    /** @test */
    public function it_create_a_new_product()

    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->actingAs($user)->get(route('stocks.index'));

        $response->assertSee($product->name)
            ->assertSee($product->Barcode)
            ->assertSee($product->Units)
            ->assertSee($product->Price);

    }
    /** @test */
    public function admin_can_store_a_product()
    {
        $user = factory(User::class)->create();

        Storage::fake('image');
        $file = uploadedfile::fake()->image('product.jpg');

         $response =$this->actingAs($user)->post(route('products.store'), [

            'image' => $file,
            'barcode' => '70440244123',
            'name' => 'Huawei',
            'category' => 'Computers',
            'model' => 'p123',
            'mark' => 'Huawei',
            'description' => 'Verde',
            'units' => '5',
            'price' => '200',
            'discount' => '10',
            'status' => 'Enable',


        ])->assertRedirect(route('stocks.index'))
         ->assertStatus(302);

         Storage::disk('image')->assertExists($file->hashName());


        $this->assertDatabaseHas('products',[

            'image' => ('images/' . $file->hashName()),
            'barcode' => '70440244123',
            'name' => 'Huawei',
            'category' => 'Computers',
            'model' => 'p123',
            'mark' => 'Huawei',
            'description' => 'Verde',
            'units' => '5',
            'price' => '200',
            'discount' => '10',
            'status' => 'Enable',

            ]);



    }
    function the_name_is_required()
    {
        $this->withExceptionHandling();
        $this->actingAs($user = $this->createUser());

        $data = [
                    'image' => 'public/img/avatar-female2.png',
                    'barcode' => '7044024411',
                    'name' => 'JUAN',
                    'category' => 'Computers',
                    'model' => 'p123',
                    'mark' => 'Huawei',
                    'description' => 'Verde',
                    'units' => '5',
                    'price' => '200',
                    'discount' => '10',
                    'status' => 'Enable',
                ];
                $response = $this->actingAs($user)->post(route('users.store',$data));

                $this->assertDatabaseHas('products', $data);

    }


       // /** @test */

    /*public function it_cant_a_product_without_unique_barcode()
{
    $user = factory(User::class)->create();
    $product = factory(Product::class)->create(['barcode' => '712122117']);

    $data = [
        'name' => 'JUAN',
        'barcode' => '7044024411',
        'category' => 'Accessories',
        'model' => 'p123',
        'mark' => 'Huawei',
        'description' => 'Verde',
        'units' => '5',
        'price' => '200',
        'discount' => '10',
        'status' => 'Enable',
        'image' => 'storage/app/images/uww65v8E4Yv2z9NO4DtYujpRJfo4uEQU6DvgSJEy.jpeg'
    ];

    $response = $this->actingAs($product)
        ->post(route('users.store'),$data);

    $response->assertSessionHasErrors('barcode');
    }*/

}

