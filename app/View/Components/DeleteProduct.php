<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteProduct extends Component
{
    public string $action;
    public string $confirmText;

    /**
     * Create a new component instance.
     */
    public function __construct(string $action, string $confirmText = 'Delete this product?')
    {
        $this->action = $action;
        $this->confirmText = $confirmText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-product');
    }
}
