<?php


namespace App\CategoryFactory;

use App\Product;

class Computers extends AbstractCategory implements CategoryInterface
{

    public function index($request)
    {
        $products = Product::where('category','Computers')
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
        $products = Product::where('category', 'Computers')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SearchByMark($sidebar)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }

    public function searchPrice($price)
    {
        $products = Product::where('category', 'Computers')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SidebarPrice($price)
            ->paginate(9);

        return view('store.goods', compact('products'));
    }
}
