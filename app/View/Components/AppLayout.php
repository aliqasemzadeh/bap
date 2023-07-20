<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    protected $listeners = ['updateCart' => 'render'];

    public function render()
    {
        return view('layouts.app');
    }
}
