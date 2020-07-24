<?php

namespace App\Repositories;

interface CategoryInterface
{
    public function getPaginated($request,$category);

    public function getSearchMark($sidebar,$category);

    public function getSearchPrice($price,$category);

}
