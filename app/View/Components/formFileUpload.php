<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formFileUpload extends Component
{
    /**
     * Create a new component instance.
     */
    public $bname;
    public $fname;


     public function __construct($bname,$fname,)
    {
        $this->bname=$bname;
        $this->fname=$fname;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-file-upload');
    }
}
