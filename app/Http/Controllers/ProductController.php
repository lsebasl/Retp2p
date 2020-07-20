<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsSearchRequest;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Mark;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProductsSearchRequest $request
     * @return View
     */
    public function index(ProductsSearchRequest $request):View
    {

        $product = Product::orderBy('created_at', request('sorted', 'DESC'))
            ->name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->status($request->get('search-status'))
            ->paginate(8);

        return view('products.index', ['products' => $product]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        $marks = Mark::all();
        $product = new Product();
        return view('products.create', compact('product','marks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductsStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductsStoreRequest $request):RedirectResponse
    {

        $product= new Product($request->validated());

        $product->image = $request->file('image')->store('images');

        $product->save();

        return redirect()->route('stocks.index')->with('success', 'Client Has Been Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return View
     */
    public function edit(Product $product):View
    {
        $marks = Mark::all();
        return view('products.edit', compact('product','marks'));
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param  Product               $product
     * @param  ProductsUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, ProductsUpdateRequest $request):RedirectResponse
    {
        if($request->hasFile('image')) {
            Storage::delete($product->image);

            $product->fill($request->validated());

            $product->image = $request->file('image')->store('images');

            $product->save();
            $image= Image::make(Storage::get($product->image));
            $image->widen(600)->encode();

            Storage::put($product->image, (string) $image);

        }
        else{
            $product->update(array_filter($request->validated()));
        }

        return redirect()->route('products.show', $product)->with('success', 'Client Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return RedirectResponse
     * @throws \Exception
     */

    public function destroy(Product $product):RedirectResponse
    {
        Storage::delete($product->image);
        $product->delete();
        return back()->with('success', 'Product Has Been Deleted');
    }
}

