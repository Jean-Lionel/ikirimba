<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
	public float $counter = 5;
    public function render()
    {
        return view('livewire.counter');
    }
}
