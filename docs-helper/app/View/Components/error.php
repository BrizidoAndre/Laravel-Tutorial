<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class error extends Component
{
    public $er;

    /**
     * Create a new component instance.
     */
    public function __construct($er)
    {
        $this->er = $er;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error');
    }
}
