<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class appForm extends Component
{

    public $id;
    public $type;
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($type,$title ="")
    {
    
     $this->type =$type ;
     $this->title=  $title ;
   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-form');
    }
}
