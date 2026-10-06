<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    public array $menu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = [
            ['label' => 'home', 'link' => route('home')],
            ['label' => 'tenders', 'link' => route('tenders.index')],
            ['label' => 'about', 'link' => '/about'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.site');
    }
}
