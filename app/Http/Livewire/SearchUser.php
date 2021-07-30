<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class SearchUser extends Component
{
    public $term = "";
    public $message;

    public function render()
    {
        sleep(1);

        if($this->term == ""){
            $events = Event::all();
        } else {
            $events = Event::like('name', '%' . $this->term . '%')->get()->paginate(10);
        }

        $data = [
            'users' => $events,
        ];

        return view('livewire.search-user', $data);
    }
}
