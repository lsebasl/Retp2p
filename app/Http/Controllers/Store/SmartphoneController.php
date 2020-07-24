<?php

namespace App\Http\Controllers\Store;

use App\Helpers\Logs;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;
use App\Repositories\CategoryInterface;
use Illuminate\View\View;


class SmartphoneController extends Controller
{
    protected $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @param CategoryInterface $categoryRepository
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the products in the store.
     *
     * @param ProductsStoreSearchRequest $request
     * @return View
     */
    public function index(ProductsStoreSearchRequest $request):View
    {

        $products = $this->categoryRepository->getPaginated($request,'Mobiles');

        return view('store.smartphones', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return View
     */
    public function show(Product $product)

    {

        return view('store.show', ['product' => $product]);
    }



    /**
     * Show the products in the store searching by mark.
     *
     * @param $sidebar
     * @return View
     */

    public function searchMark($sidebar):View
    {
        $products = $this->categoryRepository->getSearchMark($sidebar,'Mobiles');

        return view('store.smartphones', compact('products'));
    }

    public function searchPrice($price):View
    {
        $products = $this->categoryRepository->getSearchPrice($price,'Mobiles');

        return view('store.smartphones', compact('products'));
    }




}
