<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ProductCreated;
use App\Events\ProductSaveImage;
use App\Exports\ProductsExport;
use App\Helpers\Logs;
use App\Http\Requests\ProductsSearchRequest;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Imports\ProductsImport;
use App\Mark;
use App\Product;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Events\ProductUpdate;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the products like image gallery.
     *
     * @param  ProductsSearchRequest $request
     * @return View
     */
    public function index(ProductsSearchRequest $request):View
    {
        $products = $this->productRepository->getPaginated($request, 8);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create():View
    {
        $product = new Product();

        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  ProductsStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductsStoreRequest $request):RedirectResponse
    {
        $product = $this->productRepository->store($request);

        ProductSaveImage::dispatch($product);

        ProductCreated::dispatch($product, auth()->user());

        return redirect()->route('stocks.index')->with('success', 'Client Has Been Created!');
    }

    /**
     * Display the specified product.
     *
     * @param  Product $product
     * @return View
     */
    public function show(Product $product)
    {
        Logs::AuditLogger($product, 'show');

        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  Product $product
     * @return View
     */
    public function edit(Product $product):View
    {
        Logs::AuditLogger($product, 'edit');

        return view('products.edit', compact('product'));
    }

    /**
     *  Update the specified product in storage.
     *
     * @param  Product               $product
     * @param  ProductsUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, ProductsUpdateRequest $request):RedirectResponse
    {
        if ($request->hasFile('image')) {
            $this->productRepository->deleteImage($product);

            $product = $this->productRepository->fillProduct($product, $request);

            ProductSaveImage::dispatch($product);
        } else {
            $product = $this->productRepository->update($product, $request);
        }

        ProductUpdate::dispatch($product, auth()->user());

        return redirect()->route('products.show', $product)->with('success', 'Client Has Been Updated!');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  Product $product
     * @return RedirectResponse
     * @throws Exception
     */

    public function destroy(Product $product):RedirectResponse
    {
        Logs::AuditLogger($product, 'destroy');

        $this->productRepository->deleteImage($product);

        $this->productRepository->deleteProduct($product);

        return redirect()->route('stocks.index')->with('success', 'Product Has Been Deleted');
    }


    /**
     * @param Request $request
     * @return Response|BinaryFileResponse
     */
    public function export(Request $request)
    {
        $product = Product::name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->mark($request->get('search-mark'))
            ->status($request->get('search-status'));

        return (new ProductsExport($product))->download('products.xlsx');

    }

    /**
     * Import products with validation.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function import(Request $request)
    {
        try {
            Excel::import(new ProductsImport, $request->file('file'));

            return redirect(route('stocks.index'))->with('success', 'All good!');

            //Excel::import(new ProductsImport, $request->file('file'));


        } catch (ValidationException $e){

           return $this->displayErrors($e);
        }

    }

    /**
     * Create message of each error when import and redirect to stocks.
     *
     * @param $e
     * @return Application|RedirectResponse|Redirector
     */
    public function displayErrors($e):RedirectResponse
    {

        $message = '';
        foreach ($e->failures() as $fail){

          $fail->row();
          $fail->attribute();
          $fail->errors();
          $fail->values();

          $message .= 'Row' . " "  . $fail->row() . " "  . 'Column' . " "  . $fail->attribute() . " " .$fail->errors()[0];'<br>';

        }

        Session::flash('Validation Message', 'Error found in : <br>' . $message);

        return redirect(route('stocks.index'))->with('error', 'Fail!!' );


    }

    public function keyExist($val)
    {

        return Product::where('id',$val['id'])->first();

    }


}
