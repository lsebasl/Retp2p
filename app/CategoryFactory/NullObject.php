<?php


namespace App\CategoryFactory;

use App\Product;

class NullObject extends AbstractCategory implements CategoryInterface
{

    public function index($request)
    {

    }

    public function show($id)
    {

    }

    public function searchBrand($sidebar)
    {

    }

    public function searchPrice($price)
    {

    }
}
