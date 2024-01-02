<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class appModal extends Component
{

    public $id;
    public $type;
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct( $id,$type,$title)
    {
     $this->id=$id;
     $this->type =$type ;
     $this->title=  $title ;
   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-modal');
    }
}
