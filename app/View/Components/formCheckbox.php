<?php

namespace App\View\Components;

use Closure;
use App\Traits\HasCheckbox;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class formCheckbox extends Component
{
    /**
     * Create a new component instance.
     */
    public $fname;
    public $options=[''];
    public $icon;
    public $display;

   
    /**
     * Create a new component instance.
     */
    public function __construct($fname,$options,$icon,$display)
    {
        $this->fname=$fname;
        $this->options=$options;
        $this->icon=$icon;
        $this->display=$display;

      
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-checkbox');
    }
}
