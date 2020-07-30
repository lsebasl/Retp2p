<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_view_product_index()
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_view_product_create()
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

    }
    /**
     * @test
     */
    public function no_authenticated_user_cant_create_product()
    {
        $this->actingAs($user = $this->createUser());

        $this->post(
            'products', ['name' => '',
            'barcode' => '70024411 ',
            'category' => 'Mobiles',
            'model' => 'p123',
            'mark' => 'Huawei',
            'description' => 'Verde',
            'units' => '5',
            'price' => '200',
            'discount' => '10',
            'status' => 'Enable',]
        );

        $this->assertDatabaseEmpty('products');


    }

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_view_product_show()
    {
        $product = factory(Product::class)->create();

        $this->get(route('products.show', $product))
            ->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_view_product_edit()
    {
        $Product = factory(Product::class)->create();

        $this->get(route('products.edit', $Product))
            ->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_product_update()
    {
        $Product = factory(Product::class)->create();

        $this->put(route('products.update', $Product))
            ->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function no_authenticated_user_cant_access_to_product_delete()
    {
        $product = factory(Product::class)->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function it_show_if_product_list_is_empty()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('Without Products')
            ->assertOk();

    }

    /**
     * @test
     */
    public function admin_can_see_product_list_view()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.index'));

        $response->assertSee('Status')
            -> assertSee('Search')
            ->assertSee('Clear')
            ->assertSee('units')
            ->assertViewIs('products.index')
            ->assertOk()
            ->assertSee($product->Units)
            ->assertSee($product->status)
            ->assertSee($product->category);
    }


    /**
     * @test
     */
    public function admin_can_see_product_stocks_view()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->actingAs($user)->get(route('stocks.index'));

        $response->assertSee($product->name)
            ->assertSee($product->Barcode)
            ->assertSee($product->Units)
            ->assertSee($product->Price)
            ->assertStatus(200)
            ->assertOk();

    }

    /**
     * @test
     */
    public function user_can_see_product_goods_view()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create(['category' => 'Computers']);

        $response = $this->actingAs($user)->get(route('goods.index'));

        $response->assertSee($product->name)
            ->assertSee($product->image)
            ->assertSee($product->Price)
            ->assertStatus(200)
            ->assertOk();

    }

    /**
     * @test
     */
    public function admin_can_see_create_products_form()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.create'));

        $response->assertSee('barcode')
            ->assertSee('name')
            ->assertSee('status')
            ->assertSee('price')
            ->assertStatus(200)
            ->assertOk();;

    }
    /**
     * @param        string      $field
     * @param        string|null $value
     * @dataProvider ValidSearchItemsProvider
     * @test
     */
    public function show_stocks_with_a_partial_search_by_price_product(string $field, ?string $value)
    {

        $user = factory(User::class)->create();

        $filters = [
            $field=> $value
        ];

        $response = $this->actingAs($user)
            ->get(route('stocks.index', $filters));

        $response->assertSessionDoesntHaveErrors($field)
            ->assertStatus(200);

    }

    /**
     * @param        string      $field
     * @param        string|null $value
     * @dataProvider ValidSearchItemsProvider
     * @test
     */
    public function show_products_with_a_partial_search_by_price_product(string $field, ?string $value)
    {

        $user = factory(User::class)->create();

        $filters = [
            $field=> $value
        ];

        $response = $this->actingAs($user)
            ->get(route('products.index', $filters));

        $response->assertSessionDoesntHaveErrors($field)
                 ->assertStatus(200);

    }

    /**
     * @param        string      $field
     * @param        string|null $value
     * @dataProvider notValidSearchItemsProvider
     * @test
     */
    public function products_search_fails_when_a_search_item_is_not_valid(string $field, ?string $value)
    {

        $user = factory(User::class)->create();

        $filters = [
                $field=> $value
        ];

        $response = $this->actingAs($user)
            ->get(route('products.index', $filters));

        $response->assertSessionHasErrors($field);

    }

    /**
     * @test
     */
    public function admin_can_update_a_product()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        Storage::fake('image');
        $file = uploadedfile::fake()->image('product.jpg');

        Event::fake();

        $this->actingAs($user)
            ->put(route('products.update',$product), $this->getValidData($file))
            ->assertRedirect(route('products.show',$product));


        $this->assertDatabaseHas(
            'products', [
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

            ]
        );

    }

    /**
     * @test
     */
    public function admin_can_store_a_product()
    {
        $user = factory(User::class)->create();

        Storage::fake('image');
        $file = uploadedfile::fake()->image('product.jpg');

        Event::fake();

        $this->actingAs($user)
            ->post(route('products.store'), $this->getValidData($file))
            ->assertRedirect(route('stocks.index'))
            ->assertStatus(302);

        $this->assertDatabaseHas(
            'products', [

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

            ]
        );

    }


    /**
     * @test
     * @dataProvider productsDataProvider
     */
    public function admin_cant_store_a_incomplete_product_form()
    {
        $user = factory(User::class)->create();

        Storage::fake('image');

        $file = uploadedfile::fake()->image('product.jpg');

        $response =$this->actingAs($user)->post(
            route('products.store'), [

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
            'status' => '',

            ]
        );

        $this->assertDatabaseEmpty('products');

    }

    /**
     * @test
     */
    public function admin_can_delete_a_product()
    {
        $product = factory(Product::class)->create();
        $admin = factory(User::class)->create();

        $this->actingAs($admin)->delete(route('products.destroy', $product))
            ->assertRedirect(route('stocks.index'));

        $this->assertDatabaseEmpty('products');

    }

    /**
     * @return array
     */
    public function ValidSearchItemsProvider(): array
    {
        return [
            'Test name' => ['search-name', Str::random(29)],
            'Test status Enable' => ['search-status', 'Enable'],
            'Test status Disable' => ['search-status', 'Disable'],
            'Test category Mobiles ' => ['search-category', 'Mobiles'],
            'Test category Computers' => ['search-category', 'Computers'],
            'Test category Tv & Video' => ['search-category', 'Tv & Video'],
            'Test category Accessories' => ['search-category', 'Accessories'],
        ];
    }

    /**
     * @return array
     */
    public function notValidSearchItemsProvider(): array
    {
        return [
            'Test name is too long' => ['search-name', Str::random(50)],
            'Test status is incorrect' => ['search-status', 'ena'],
            'Test category is incorrect' => ['search-category', 'test'],
        ];
    }

    /**
     * @return array
     */
    public function productsDataProvider():array
    {
        return [
            'Test barcode is required' => ['barcode',null],
            'Test barcode is too short' => ['barcode','1'],
            'Test barcode is too long' => ['barcode',Str::random(81)],
            'Test name is required' => ['name',null],
            'Test name is too short' => ['name','n'],
            'Test name is too long' => ['name',Str::random(81)],
            'Test category is required' => ['category',null],
            'Test category is short' => ['category','c'],
            'Test category is long' => ['category',Str::random(81)],
            'Test model is required' => ['model',null],
            'Test model is short' => ['model','m'],
            'Test model is long' => ['model',Str::random(81)],
            'Test mark is required' => ['mark',null],
            'Test description is required' => ['description',null],
            'Test description is short' => ['description','d'],
            'Test description is long' => ['description',Str::random(81)],
            'Test units is required' => ['units',null],
            'Test units is long' => ['units','100000'],
            'Test price is status' => ['model',null],
            'Test discount is required' => ['discount',null],

        ];

    }

    /**
     * @param  \Illuminate\Http\Testing\File $file
     * @return array
     */
    public function getValidData(\Illuminate\Http\Testing\File $file)
    {
        return ([

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
        ]);

    }


}

