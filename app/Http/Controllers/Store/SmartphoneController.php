<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;
use App\Repositories\CategoryInterface;
use App\Repositories\CategoryRepository;
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
     * Show the products in the store searching by mark.
     *
     * @param $sidebar
     * @return View
     */

    public function searchMark($sidebar)
    {
        $products = $this->categoryRepository->getSearchMark($sidebar,'Mobiles');

        return view('store.smartphones', compact('products'));
    }



}
