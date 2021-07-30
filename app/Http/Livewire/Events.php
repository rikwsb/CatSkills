<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Events extends Component
{

    public $events;

    public function mount()
    {
        $this->events = Event::all();
    }

    public function render()
    {
        return view('livewire.events', [
            'events' => $this->events,
        ]);
    }
}
