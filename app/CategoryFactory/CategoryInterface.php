<?php


namespace App\CategoryFactory;


use App\Http\Requests\ProductsStoreSearchRequest;

interface CategoryInterface
{

    public function index(ProductsStoreSearchRequest $request);

    public function show($id);

    public function searchBrand($sidebar);

    public function searchPrice($price);

}
