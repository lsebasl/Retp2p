<?php


namespace App\CategoryFactory;

use App\Http\Requests\ProductsSearchRequest;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Product;

class Mobiles extends AbstractCategory implements CategoryInterface
{

    public function index(ProductsStoreSearchRequest  $request)
    {
       $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
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
        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SearchByMark($sidebar)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }

    public function searchPrice($price)
    {
        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SidebarPrice($price)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }
}
