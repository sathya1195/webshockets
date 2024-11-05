<?php

namespace App\Livewire;

use App\Events\IncreaseEvent;
use Livewire\Component;

class CountIncreament extends Component
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
        return view('livewire.count-increament');
    }
}
