<?php

namespace Tests\Feature\Reports;

use App\Category;
use App\Mark;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private $user;

    public function setUp(): void
    {

        parent::setUp();

        Permission::create(['name' => 'roles.index', 'description' => 'Access to see roles lists']);
        Permission::create(['name' => 'roles.create', 'description' => 'Access to form create roles']);
        Permission::create(['name' => 'roles.destroy','description' => 'Access to delete roles']);
        Permission::create(['name' => 'roles.show','description' => 'Access to see a specific roles']);
        Permission::create(['name' => 'roles.edit','description' => 'Access to edit roles']);


        Permission::create(['name' => 'users.index', 'description' => 'Access to see users list']);
        Permission::create(['name' => 'users.destroy','description' => 'Access to see delete users']);
        Permission::create(['name' => 'users.show','description' => 'Access to see a specific user']);
        Permission::create(['name' => 'users.edit','description' =>'Access to edit users']);

        Permission::create(['name' => 'products.index', 'description' => 'Access to see products lists']);
        Permission::create(['name' => 'products.create', 'description' => 'Access to create products']);
        Permission::create(['name' => 'products.destroy','description' => 'Access to delete products']);
        Permission::create(['name' => 'products.show','description' => 'Access to see a specific product']);
        Permission::create(['name' => 'products.edit','description' => 'Access to edit products']);

        Permission::create(['name' => 'clients.index','description' => 'Access to see products clients']);
        Permission::create(['name' => 'clients.create','description' => 'Access to create clients']);
        Permission::create(['name' => 'clients.destroy','description' => 'Access to delete clients']);
        Permission::create(['name' => 'clients.show','description' => 'Access to see a specific client']);
        Permission::create(['name' => 'clients.edit','description' => 'Access to edit a clients']);

        Permission::create(['name' => 'invoices.index','description' => 'Access to see invoices']);
        Permission::create(['name' => 'invoices.create','description' => 'Access to create invoices']);
        Permission::create(['name' => 'invoices.destroy','description' => 'Access to eliminate invoices']);
        Permission::create(['name' => 'invoices.show','description' => 'Access to see a specific invoices']);
        Permission::create(['name' => 'invoices.edit','description' => 'Access to edit invoices']);

        Permission::create(['name' => 'stocks.index','description' => 'Access to see inventory']);

        Permission::create(['name' => 'home','description' => 'Access to administrative interface']);

        Permission::create(['name' => 'export','description' => 'Access to export excel products']);
        Permission::create(['name' => 'import','description' => 'Access to import excel products']);

        Permission::create(['name' => 'payment.attempt','description' => 'Access to pay products']);
        Permission::create(['name' => 'payment.history','description' => 'Access to see payment attempts']);
        Permission::create(['name' => 'payment.callback','description' => 'Access to pay products']);

        Permission::create(['name' => 'store.profile','description' => 'Access to see profile']);
        Permission::create(['name' => 'cart.add','description' => 'Access to add to shopping cart']);
        Permission::create(['name' => 'cart.show','description' => 'Access to see to shopping cart']);
        Permission::create(['name' => 'cart.update','description' => 'Access to update shopping cart']);
        Permission::create(['name' => 'cart.destroy','description' => 'Access to delete shopping cart']);

        Permission::create(['name' => 'report.index','description' => 'Access see report systems view']);
        Permission::create(['name' => 'report.show','description' => 'Access to create systems reports']);
        Permission::create(['name' => 'users.export','description' => 'Access to export users systems reports']);
        Permission::create(['name' => 'products.export','description' => 'Access to export products systems reports']);
        Permission::create(['name' => 'sells.export','description' => 'Access to export sells systems reports']);

        $admin = Role::create(['name' => 'Admin','description' => 'Allows the user to have full access to the application.']);
        $client = Role::create(['name' => 'Client','description' => 'User buyer.']);
        $admin->givePermissionTo([
            'report.index',
            'report.show',
            'users.export',
            'products.export',
            'sells.export',
            'users.index',
            'users.destroy',
            'users.show',
            'users.edit',
            'products.index',
            'products.create',
            'products.destroy',
            'products.show',
            'products.edit',
            'roles.index',
            'roles.create',
            'roles.destroy',
            'roles.show',
            'roles.edit',
            'clients.index',
            'clients.create',
            'clients.destroy',
            'clients.show',
            'clients.edit',
            'invoices.index',
            'invoices.create',
            'invoices.destroy',
            'invoices.show',
            'invoices.edit',
            'stocks.index',
            'home',
            'export',
            'import',
            'payment.attempt',
            'payment.history',
            'payment.callback',
            'store.profile',
            'cart.add',
            'cart.show',
            'cart.update',
            'cart.destroy',
        ]);

        $this->user = factory(User::class)->create(['role' => 'Admin']);
        $this->user->assignRole('Admin');

    }

    /**
     * @test
     */
    public function admin_can_see_report_view()
    {
        $response = $this->actingAs($this->user)->get(route('report.index'));

        $response->assertSee('DATA')
            ->assertSee('Chart')
            ->assertSee('LABEL')
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @test
     * @dataProvider ValidChartItemsProvider
     * @param string $field
     * @param string|null $value
     */
    public function admin_can_create_different_type_chart(string $field, ?string $value)
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['status' => 'Enable']);

        $request = [
            $field=> $value,
            'reportType' => 'usersStatus',
            'initialDate' => '2020-12-01',
            'finalDate' => '2020-12-30',
        ];

        $response = $this->actingAs($this->user)->get(route('report.show',$request));

        $response->assertSee('DATA')
            ->assertSee('Chart')
            ->assertSee('LABEL')
            ->assertSee('Enable')
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @test
     * @dataProvider ValidReportTypeProvider
     * @param string $field
     * @param string|null $value
     */
    public function admin_can_create_different_type_report(string $field, ?string $value)
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['status' => 'Enable']);

        $request = [
            $field=> $value,
            'typeChart' => 'bar',
            'initialDate' => '2020-12-01',
            'finalDate' => '2020-12-30',
        ];

        $response = $this->actingAs($this->user)->get(route('report.show',$request));

        $response->assertSee('DATA')
            ->assertSee('Chart')
            ->assertSee('LABEL')
            ->assertSee('Enable')
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @test
     * @dataProvider ValidExportProductItemsProvider
     * @param string $field
     * @param $value
     */
    public function admin_can_export_products_list(string $field, $value)
    {
        factory(Category::class)->create(
            ['id'=>1,
                'name'=>'Mobiles']
        );
        factory(Category::class)->create(
            ['id'=>2,
                'name'=>'Computers']
        );
        factory(Category::class)->create(
            ['id'=>3,
                'name'=>'Tv & Video']
        );
        factory(Category::class)->create(
            ['id'=>4,
                'name'=>'Accessories']
        );
        factory(Mark::class)->create(
            ['id'=>1,
                'name'=>'Huawei']
        );

        Excel::fake();

        $filters = [
            $field=> $value,

        ];

        $this->actingAs($this->user)
            ->get(route('export',$filters));

        Excel::assertDownloaded('products.xlsx');

    }

    /**
     * @test
     * @dataProvider ValidUsersExportReportItemProvider
     * @param string $field
     * @param $value
     */
    public function admin_can_export_report_users(string $field, $value)
    {
        $this->withoutExceptionHandling();

        $users = factory(User::class,10)->create();

        Excel::fake();

        $filters = [
            $field=> $value,
            'initialDate' => '2020-12-01',
            'finalDate' => '2020-12-30',
            'exportType' => 'exportUsers',
        ];

        $this->actingAs($this->user)
            ->get(route('users.export',$filters));

        Excel::assertQueued('exportUsers.xlsx');
    }

    /**
     * @test
     * @dataProvider ValidProductsExportReportItemProvider
     * @param string $field
     * @param $value
     */
    public function admin_can_export_report_products(string $field, $value)
    {
        $this->withoutExceptionHandling();

        $products = factory(Product::class,10)->create();

        factory(Category::class)->create(
            ['id'=>1,
                'name'=>'Mobiles']
        );
        factory(Category::class)->create(
            ['id'=>2,
                'name'=>'Computers']
        );
        factory(Category::class)->create(
            ['id'=>3,
                'name'=>'Tv & Video']
        );
        factory(Category::class)->create(
            ['id'=>4,
                'name'=>'Accessories']
        );
        factory(Mark::class)->create(
            ['id'=>1,
                'name'=>'Huawei']
        );

        Excel::fake();

        $filters = [
            $field=> $value,
            'initialDate' => '2020-12-01',
            'finalDate' => '2020-12-30',
            'exportType' => 'exportProducts',
        ];

        $this->actingAs($this->user)
            ->get(route('products.export',$filters));

        Excel::assertQueued('exportProducts.xlsx');
    }

    /**
     * @test
     * @dataProvider ValidProductsExportReportItemProvider
     * @param string $field
     * @param $value
     */
    public function admin_can_export_report_sells(string $field, $value)
    {
        $this->withoutExceptionHandling();

        $products = factory(Product::class,10)->create();

        Excel::fake();

        $filters = [
            $field=> $value,
            'initialDate' => '2020-12-01',
            'finalDate' => '2020-12-30',
            'exportType' => 'exportSells',
        ];

        $this->actingAs($this->user)
            ->get(route('sells.export',$filters));

        Excel::assertQueued('exportSells.xlsx');
    }


    /**
     * @test
     */
    public function user_can_import_products()
    {
        $category = factory(Category::class)->create(
            [
                'id' => '2'
            ]
        );

        $importFile = $this->getUploadedFile('file.xlsx');

        $response = $this->actingAs($this->user)->post(route('import'), ['file' => $importFile]);

        $response->assertRedirect(route('stocks.index'));

    }

    public function getUploadedFile(string $fileName):UploadedFile
    {
        $filePath = base_path('tests/stubs/' . $fileName);

        return new UploadedFile($filePath, 'file.xlsx', null, null, true);
    }


    /**
     * @return array
     */
    public function ValidUsersExportReportItemProvider(): array
    {
        return [
            'Test status Enable' => ['status', 'Enable'],
            'Test status Disable' => ['status', 'Disable'],
            'Test idType Card ID' => ['idType', 'Card ID'],
            'Test idType Foreign ID' => ['idType', 'Foreign ID'],
            'Test idType NIT' => ['idType', 'NIT'],
            'Test idType Passport' => ['idType', 'Passport'],
        ];
    }

    /**
     * @return array
     */
    public function ValidProductsExportReportItemProvider(): array
    {
        return [
            'Test status Enable' => ['status', 'Enable'],
            'Test status Disable' => ['status', 'Disable'],
            'Test category Mobiles ' => ['category', 1],
            'Test category Computers' => ['category', 2],
            'Test category Tv & Video' => ['category', 3],
            'Test category Accessories' => ['category', 4],
            'Test mark Huawei' => ['mark','Huawei'],
        ];
    }

    /**
     * @return array
     */
    public function ValidExportProductItemsProvider(): array
    {
        return [
            'Test status Enable' => ['search-status', 'Enable'],
            'Test status Disable' => ['search-status', 'Disable'],
            'Test category Mobiles ' => ['search-category', 1],
            'Test category Computers' => ['search-category', 2],
            'Test category Tv & Video' => ['search-category', 3],
            'Test category Accessories' => ['search-category', 4],
            'Test mark Huawei' => ['search-mark','Huawei'],
        ];
    }

    /**
     * @return array
     */
    public function ValidChartItemsProvider():array
    {
        return [
            'Test typeChart is horizontalBar' => ['typeChart','horizontalBar'],
            'Test typeChart is pie' => ['typeChart','pie'],
            'Test typeChart is polarArea' => ['typeChart','polarArea'],
            'Test typeChart is doughnut' => ['typeChart','doughnut'],
            'Test typeChart is line' => ['typeChart','line'],
            'Test typeChart is bar' => ['typeChart','bar'],

        ];
    }

    public function ValidReportTypeProvider():array
    {
        return [

            'Test reportType is usersStatus' => ['reportType','usersStatus'],
            'Test reportType is sellByStatus' => ['reportType','sellByStatus'],
            'Test reportType is sellByCategory' => ['reportType','sellByCategory'],
            'Test reportType is sellByProduct' => ['reportType','sellByProduct'],
            'Test reportType is topClient' => ['reportType','topClient'],
            'Test reportType is stockByCategory' => ['reportType','stockByCategory'],

        ];

    }




}
