<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use Illuminate\View\View;
use App\Repositories\CategoryInterface;

class LaptopController extends Controller
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

        $products = $this->categoryRepository->getPaginated($request,'Computers');

        return view('store.laptop', compact('products'));
    }

    /**
     * Show the products in the store searching by mark.
     *
     * @param $sidebar
     * @return View
     */

    public function searchMark($sidebar)
    {
        $products = $this->categoryRepository->getSearchMark($sidebar,'Computers');

        return view('store.laptop', compact('products'));
    }

    public function searchPrice($price):View
    {
        $products = $this->categoryRepository->getSearchPrice($price,'Computers');

        return view('store.laptop', compact('products'));
    }

}
