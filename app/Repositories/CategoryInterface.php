<?php

namespace App\Repositories;

interface CategoryInterface
{
    /**
     *
     * @param  $request
     * @param  $category
     * @return mixed
     */
    public function getPaginated($request, $category);

    /**
     * @param  $sidebar
     * @param  $category
     * @return mixed
     */
    public function getSearchMark($sidebar, $category);

    /**
     * @param  $price
     * @param  $category
     * @return mixed
     */
    public function getSearchPrice($price, $category);

    /**
     * @param  $id
     * @return mixed
     */
    public function getFindOrFail($id);
}
