<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use Illuminate\View\View;
use App\Repositories\CategoryInterface;

class HeadphonesController extends Controller
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

        $products = $this->categoryRepository->getPaginated($request,'Accessories');

        return view('store.headphones', compact('products'));
    }

    /**
     * Show a specific headphone product.
     *
     * @param $id
     * @return View
     */
    public function show($id):View
    {
        $product = $this->categoryRepository->getFindOrFail($id);

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
        $products = $this->categoryRepository->getSearchMark($sidebar,'Accessories');

        return view('store.headphones', compact('products'));
    }

    /**
     * Show the products in the store searching by price.
     *
     * @param $price
     * @return View
     */
    public function searchPrice($price):View
    {
        $products = $this->categoryRepository->getSearchPrice($price,'Accessories');

        return view('store.headphones', compact('products'));
    }



}
