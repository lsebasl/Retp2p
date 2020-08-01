<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;

use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class GoodsController extends Controller
{
    protected $categoryRepository;


    /**
     * Create a new controller instance.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show view after validated and filter the product on store.
     *
     * @param ProductsStoreSearchRequest $request
     * @return View
     */
    public function index(ProductsStoreSearchRequest $request):View
    {

        $products = $this->categoryRepository->getPaginated($request);

        return view('store.goods', compact('products'));
    }

    /**
     * Show view after choose a specif category.
     *
     * @param $category
     * @return View
     */
    protected function category($category):View
    {

        $products = $this->categoryRepository->category($category);

        return view('store.goods', compact('products'));
    }

    /**
     * Show a specific product in the store.
     *
     * @param  $id
     * @return View
     */
    public function show($id):View
    {
        $product = $this->categoryRepository->findById($id);

        return view('store.show', ['product' => $product]);
    }
}
