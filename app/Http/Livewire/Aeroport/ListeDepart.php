<?php

namespace App\Http\Livewire\Aeroport;

use Livewire\Component;
use App\Models\Aeroport;

class ListeDepart extends Component
{
    public $departs;

    public function mount()
    {
        $this->departs = Aeroport::all()->toJson();
    }

    public function render()
    {
        return view('livewire.aeroport.liste-depart', [
            'departs' => $this->departs
        ]);
    }
}
