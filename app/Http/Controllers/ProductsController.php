<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $product = Product::all();

        return response()->view('stocks.index', ['products' => $product]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new product;
        return response()->view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required|min:3|max:30|unique:barcode',
            'name' => 'required|min:3|max:30',
            'category' => 'required|in:Computers,Tv & Video,Smartphones,Accessories',
            'model' => 'required|min:2|max:30',
            'mark' => 'required|min:2|max:30',
            'description' => 'required|min:3|max:20',
            'units' => 'required|Integer',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required|in:Enable,Disable',

        ]);
        $createProduct = new Product([

            'barcode' => $request->get('barcode'),
            'name' => $request->get('name'),
            'category' => $request->get('category'),
            'model' => $request->get('model'),
            'mark' => $request->get('mark'),
            'description' => $request->get('description'),
            'units' => $request->get('units'),
            'price' => $request->get('price'),
            'discount' => $request->get('discount'),
            'status' => $request->get('status'),
            ]);
        $createProduct->save();
        return redirect()->route('stocks.index')->with('success','Client Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)

    {
        return response()->view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *

     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)

    {
        return response()->view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return void
     */

    public function update(Request $request,Product $product)
    {
        {
            $request->validate([
                'barcode' => ['required',Rule::unique('products')->ignore($product->id),'min:3','max:30'],
                'name' => 'required|min:3|max:30',
                'category' => 'required|in:Computers,Tv & Video,Smartphones,Accessories',
                'model' => 'required|min:2|max:30',
                'mark' => 'required|min:2|max:30',
                'description' => 'required|min:3|max:20',
                'units' => 'required|Integer',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'status' => 'required|in:Enable,Disable',
            ]);

            $product->update([

                'barcode' => $request->get('barcode'),
                'name' => $request->get('name'),
                'category' => $request->get('category'),
                'model' => $request->get('model'),
                'mark' => $request->get('mark'),
                'description' => $request->get('description'),
                'units' => $request->get('units'),
                'price' => $request->get('price'),
                'discount' => $request->get('discount'),
                'status' => $request->get('status'),

            ]);

            return redirect()->route('products.show', $product)->with('success', 'Client Has Been Updated!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     * @throws \Exception
     */

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
