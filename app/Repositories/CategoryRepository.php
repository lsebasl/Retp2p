<?php

namespace App\Repositories;
use App\Product;

class CategoryRepository implements CategoryInterface
{
    public function getPaginated($request,$category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->price($request->get('price'))
            ->name($request->get('name'))
            ->mark($request->get('mark'))
            ->paginate(9);
    }

    public function getSearchMark($sidebar,$category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SearchByMark($sidebar)
            ->paginate(9);
    }


        public function getSearchPrice($price,$category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SidebarPrice($price)
            ->paginate(9);
    }

        public function getFindOrFail($id)
    {
        return  Product::findOrfail($id);
    }




}
