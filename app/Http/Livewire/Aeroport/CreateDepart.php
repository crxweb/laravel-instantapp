<?php

namespace App\Http\Livewire\Aeroport;

use Livewire\Component;
use App\Models\Aeroport;
use App\Events\DepartCreated;

class CreateDepart extends Component
{

    public $horaire = "";
    public $destination = "";
    public $vol = "";
    public $porte = "";
    public $observation = "";
    public $aeroport;

    protected function getListeners()
    {
        return [
            'echo:depart,DepartCreated' => 'notifyNewOrder',
        ];
    }

    public function notifyNewOrder()
    {
        
    }

    public function create()
    {
        $valided_data = $this->validate([
            'horaire' => 'required',
            'destination' => 'required',
            'vol' => 'required',
            'porte' => 'required',
            //'observation' => 'required',
        ]);

        $this->aeroport = Aeroport::create([
            'horaire' => $this->horaire,
            'destination' => $this->destination,
            'vol' => $this->vol,
            'porte' => $this->porte,
            'observation' => !empty($this->observation) ? $this->observation : null,
        ]);

        $this->horaire = '';
        $this->destination = '';
        $this->vol = '';
        $this->porte = '';
        $this->observation = '';


        $this->emit('createDepartSuccessForm'); // Toastr créateur nouveau départ
        $this->emitCreatedDepart(); // Broadcast Event for others

    } 

    public function emitCreatedDepart(){
        event(new DepartCreated($this->aeroport->toJson()));
    }

    public function render()
    {
        return view('livewire.aeroport.create-depart');
    }
}
