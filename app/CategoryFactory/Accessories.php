<?php


namespace App\CategoryFactory;

use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;
use Illuminate\View\View;

class Accessories extends AbstractCategory implements CategoryInterface
{

    public function index(ProductsStoreSearchRequest $request):View
    {
        $products = Product::where('category','Accessories')
            ->where('status','enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->price($request->get('price'))
            ->name($request->get('name'))
            ->mark($request->get('mark'))
            ->paginate(9);

        return view('store.goods', compact('products'));
    }

    public function show($id)
    {
        return parent::show($id);
    }


    public function searchBrand($sidebar)
    {
        $products = Product::where('category', 'Accessories')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->searchByMark($sidebar)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }

    public function searchPrice($price)
    {
        $products = Product::where('category', 'Accessories')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->sidebarPrice($price)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }
}
