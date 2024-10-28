<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formInput extends Component
{
    public $bname;
    public $fname;
    public $icon;
    public $type;
    public $status;
    public $class="";
    /**
     * Create a new component instance.
     */
    
    public function __construct($bname,$fname,$icon,$type,$status="")
    {
        $this->bname=$bname;
        $this->fname=$fname;
        $this->icon=$icon;
        $this->type=$type;
        $this->status=$status;
    

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
