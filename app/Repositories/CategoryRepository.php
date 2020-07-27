<?php

namespace App\Repositories;
use App\Product;
use Illuminate\View\View;

class CategoryRepository implements CategoryInterface
{
    /**
     * @param  $request
     * @param  $category
     * @return mixed
     */
    public function getPaginated($request, $category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->price($request->get('price'))
            ->name($request->get('name'))
            ->mark($request->get('mark'))
            ->paginate(9);
    }

    /**
     * @param  $sidebar
     * @param  $category
     * @return mixed
     */
    public function getSearchMark($sidebar, $category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SearchByMark($sidebar)
            ->paginate(9);
    }


    /**
     * @param  $price
     * @param  $category
     * @return mixed
     */
    public function getSearchPrice($price, $category)
    {
        return Product::where('category', $category)
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SidebarPrice($price)
            ->paginate(9);
    }

    /**
     * @param  $id
     * @return mixed
     */
    public function getFindOrFail($id)
    {
        return  Product::findOrfail($id);
    }




}
