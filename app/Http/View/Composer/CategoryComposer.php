<?php

namespace App\Http\View\Composer;

use App\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->category->getCacheCategory());
    }
}
