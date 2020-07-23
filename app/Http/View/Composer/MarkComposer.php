<?php

namespace App\Http\View\Composers;

use App\Mark;
use Illuminate\View\View;

class MarkComposer
{
    protected $marks;

    public function __construct(Mark $marks)
    {
        $this->marks = $marks;
    }

    public function compose(View $view)
    {
        $view->with('marks', $this->marks->getCacheMarks());
    }
}
