<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formSelect extends Component
{
    public $fname;
    public $bname ;
    public $options=[''];
    public $icon;
    public $value;
    public $display;
    public $display2;
    /**
     * Create a new component instance.
     */
    public function __construct($fname,$bname,$options,$icon,$value,$display,$display2='')
    {
        $this->fname=$fname;
        $this->bname=$bname;
        $this->options=$options;
        $this->icon=$icon;
        $this->value=$value;
        $this->display=$display;
        $this->display2=$display2;
        
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-select');
    }
}
