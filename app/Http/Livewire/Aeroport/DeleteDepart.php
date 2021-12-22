<?php

namespace App\Http\Livewire\Aeroport;

use Livewire\Component;
use App\Models\Aeroport;
use App\Events\DepartDeleted;

class DeleteDepart extends Component
{
    public $depart;
    public $depart_id;

    public function mount(Aeroport $aeroport)
    {
        $this->depart = $aeroport;
        $this->depart_id = $aeroport->id;
    }

    public function delete()
    {
        $valided_data = $this->validate([
            'depart_id' => 'required|exists:aeroports,id',
        ]);
        
        $deleted_depart = $this->depart;
        $this->depart->delete();

        $this->emit('DeleteDepartSuccessForm'); // Toastr créateur nouveau départ
        $this->emitDeletedDepart($deleted_depart); // Broadcast Event for others

    } 

    public function emitDeletedDepart(){
        event(new DepartDeleted($this->depart->toJson()));
    }

    public function render()
    {
        return view('livewire.aeroport.delete-depart');
    }
}
