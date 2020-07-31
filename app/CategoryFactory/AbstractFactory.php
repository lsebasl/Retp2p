<?php


namespace App\CategoryFactory;


abstract class AbstractFactory
{
    const MOBILES = 'Mobiles';
    const COMPUTERS = 'Computers';
    const TV_VIDEO = 'Tv & Video';
    const ACCESSORIES = 'Accessories';

    public abstract function createCategory($category);
}
