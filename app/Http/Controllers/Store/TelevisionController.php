<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;
use Illuminate\View\View;
use App\Repositories\CategoryInterface;

class TelevisionController extends Controller
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

        $products = $this->categoryRepository->getPaginated($request,'Tv & Video');

        return view('store.television', compact('products'));
    }

    /**
     * Show the products in the store searching by mark.
     *
     * @param $sidebar
     * @return View
     */

    public function searchMark($sidebar)
    {
        $products = $this->categoryRepository->getSearchMark($sidebar,'Tv & Video');

        return view('store.television', compact('products'));
    }

}
