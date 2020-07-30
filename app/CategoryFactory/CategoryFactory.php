<?php


namespace App\CategoryFactory;



use App\Http\Requests\ProductsStoreSearchRequest;

class CategoryFactory
{

    public static function createCategory(string $category):CategoryInterface
    {
        switch($category) {
            case AbstractFactory::MOBILES:
                return new Mobiles();
                break;
            case AbstractFactory::COMPUTERS:
                return new Computers();
                break;
            case AbstractFactory::TV_VIDEO:
                return new TvVideo();
                break;
            case AbstractFactory::ACCESSORIES:
                return new Accessories();
                break;
            default:
                report(new CategoryFactoryException('The category' .$category. ' has not been recognized'));
                return new NullObject();

        }
    }

}
