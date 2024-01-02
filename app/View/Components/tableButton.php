<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableButton extends Component
{
    public $icon;
    public $target;
    /**
     * Create a new component instance.
     */
    public function __construct($icon,$target)
    {
        $this->icon=$icon;
        $this->target =$target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-button');
    }

}