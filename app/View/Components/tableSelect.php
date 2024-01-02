<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableSelect extends Component
{
    public $fname;
    public $bname ;
    public $options=[];
    public $value;
   

    /**
     * Create a new component instance.
     */
    public function __construct($fname,$bname,$options,$value)
    {
        $this->fname=$fname;
        $this->bname=$bname;
        $this->options=$options;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-select');
    }
}
