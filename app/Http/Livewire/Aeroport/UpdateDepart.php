<?php

namespace App\Http\Livewire\Aeroport;

use Livewire\Component;
use App\Models\Aeroport;
use App\Events\DepartUpdated;

class UpdateDepart extends Component
{
    public $depart;
    public $depart_id;
    public $horaire;
    public $destination;
    public $vol;
    public $porte;
    public $observation;


    public function mount(Aeroport $aeroport)
    {
        $this->depart = $aeroport;
        $this->depart_id = $aeroport->id;

        $this->horaire = $aeroport->horaire;
        $this->destination = $aeroport->destination;
        $this->vol = $aeroport->vol;
        $this->porte = $aeroport->porte;
        $this->observation = $aeroport->observation;
    }

    public function update()
    {
        $valided_data = $this->validate([
            'horaire' => 'required',
            'destination' => 'required',
            'vol' => 'required',
            'porte' => 'required',
            //'observation' => 'required',
        ]);

        $this->depart->update([
            'horaire' => $this->horaire,
            'destination' => $this->destination,
            'vol' => $this->vol,
            'porte' => $this->porte,
            'observation' => !empty($this->observation) ? $this->observation : null,
        ]);      

        $this->emit('UpdateDepartSuccessForm'); // Toastr créateur nouveau départ
        $this->emitUpdatedDepart(); // Broadcast Event for others

    } 

    public function emitUpdatedDepart(){
        event(new DepartUpdated($this->depart->toJson()));
    }
    
    public function render()
    {
        return view('livewire.aeroport.update-depart');
    }
}
