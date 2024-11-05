<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\IncreaseEvent;

class CountIncrement extends Component
{
    public $count = 1;

    public $users = [];

    #[On('echo:add,IncreaseEvent')]

    public function increamentByOther($data) {
        $this->users[$data['users']['id']] = [
            'name' => $data['users']['name'],
            'count' => $data['count']
        ];

        $this->count = $data['count'];
    }

    public function increase() {

        IncreaseEvent::dispatch(\Auth::user(), $this->count + 1);
    }

    public function render()
    {
        return view('livewire:count-increment');
    }

}
