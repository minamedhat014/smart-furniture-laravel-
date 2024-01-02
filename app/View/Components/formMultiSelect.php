<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formMultiSelect extends Component
{

    public $fname;
    public $bname;
    public $options=[''];
    public $icon;
    public $value;
    public $display;
    /**
     * Create a new component instance.
     */
    public function __construct($fname,$bname,$options,$icon,$value,$display)
    {
        $this->fname=$fname;
        $this->bname=$bname;
        $this->options=$options;
        $this->icon=$icon;
        $this->value=$value;
        $this->display=$display;    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-multi-select');
    }
}
