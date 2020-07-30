<?php

namespace App\Http\Controllers\Store;

use App\CategoryFactory\CategoryFactory;
use App\Helpers\Logs;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;


class GoodsController extends Controller
{
    protected $categoryRepository;


    /**
     * Create a new controller instance.
     *
     * @param CategoryRepository $categoryRepository
     * @param $category
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

    }

    /**
     * Show the products in the store.
     *
     * @param ProductsStoreSearchRequest $request
     * @param $category
     * @return View
     */
    public function index(ProductsStoreSearchRequest $request):View
    {

        $products = $this->categoryRepository->getPaginated($request);

        return view('store.goods', compact('products'));
    }

    protected function category($category, ProductsStoreSearchRequest $request):View
    {

        return (CategoryFactory::createCategory($category))->index($request);
    }

    /**
     * Show a specific smartphone product.
     *
     * @param  $id
     * @return View
     */
    public function show($id):View
    {
        $product = $this->categoryRepository->getFindOrFail($id);

        return view('store.show', ['product' => $product]);
    }

    /**
     * Show the products in the smartphone searching by price.
     *
     * @param  $sidebar
     * @return View
     */
    public function searchBrand($sidebar):View
    {
        $products = $this->categoryRepository->getSearchBrand($sidebar, 'Mobiles');

        return view('goods.brand', compact('products'));
    }

    /**
     * Show the products in the smartphone searching by price.
     *
     * @param  $price
     * @return View
     */
    public function searchPrice($price):View
    {
        $products = $this->categoryRepository->getSearchPrice($price, 'Mobiles');

        return view('goods.brand', compact('products'));
    }
}
