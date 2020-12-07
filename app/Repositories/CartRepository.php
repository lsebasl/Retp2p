<?php

namespace App\Repositories;

use App\Cart;
use App\Invoice;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CartRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * return model cart searching by the user session and using pivot table product.
     *
     * @return Collection
     */
    public function getProduct():Collection
    {
        return Cart::where('user_id', $this->user->authUser())->with('product')->get();
    }

    /**
     * return all model searching by a specific user session.
     *
     * @return Collection
     */
    public function getCart():Collection
    {
        return Cart::where('user_id', $this->user->authUser())->get();
    }

    /**
     *
     * @param  $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return  Cart::findOrFail($id);
    }

    /**
     * Obtain the Invoice paginated
     *
     * @param  $pages
     * @return mixed
     */
    public function getPaginate($pages):LengthAwarePaginator
    {
        return  Invoice::orderBy('created_at', request('sorted', 'DESC'))->paginate($pages);
    }
}
