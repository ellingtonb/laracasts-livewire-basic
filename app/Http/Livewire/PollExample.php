<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PollExample extends Component
{
    public int $revenue;

    public function mount()
    {
        $this->revenue = $this->getRevenue();
    }

    public function getRevenue(): int
    {
        $this->revenue = \DB::table('orders')->sum('price');

        return $this->revenue;
    }

    public function render()
    {
        return view('livewire.poll-example');
    }
}
