<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;
    public $videoData;

    protected $listeners = ['openModal' => 'open'];

    public function open()
    {
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
