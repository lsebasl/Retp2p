<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    /**
     *returns the product according to the specific search in goods.index
     *
     * @param  $request
     * @return LengthAwarePaginator
     */
    public function getPaginated($request):LengthAwarePaginator
    {
        return Product::where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->category($request->get('search-category'))
            ->price($request->get('search-price'))
            ->mark($request->get('search-mark'))
            ->price($request->get('price'))
            ->name($request->get('name'))
            ->mark($request->get('mark'))
            ->paginate(9);
    }

    /**
     * return paginated in goods.index using a link in the store
     *
     * @param $category
     * @return LengthAwarePaginator
     */
    public function category($category):LengthAwarePaginator
    {
        return Product::where('status', 'enable')
            ->where('category_id', $category)
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(9);
    }

    /**
     * return product searching by id
     *
     * @param  $id
     * @return Product
     */
    public function findById($id):Product
    {
        return Product::findOrfail($id);
    }
}
