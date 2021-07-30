<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function counter()
    {
        return view('event/index');
    }
}
