<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aeroport;

class AeroportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aeroport = new Aeroport;
        $aeroport->horaire = "12:38";
        $aeroport->destination = "Londres";
        $aeroport->vol = "AF5743";
        $aeroport->porte = "E21";
        $aeroport->observation = null;
        $aeroport->save();

        $aeroport = new Aeroport;
        $aeroport->horaire = "14:30";
        $aeroport->destination = "Paris";
        $aeroport->vol = "AB5412";
        $aeroport->porte = "E12";
        $aeroport->observation = null;
        $aeroport->save();

        $aeroport = new Aeroport;
        $aeroport->horaire = "09:00";
        $aeroport->destination = "Sidney";
        $aeroport->vol = "LM4577";
        $aeroport->porte = "F54";
        $aeroport->observation = null;
        $aeroport->save();
        
        $aeroport = new Aeroport;
        $aeroport->horaire = "11:37";
        $aeroport->destination = "Rome";
        $aeroport->vol = "TWA800";
        $aeroport->porte = "K12";
        $aeroport->observation = null;
        $aeroport->save();
        
        $aeroport = new Aeroport;
        $aeroport->horaire = "08:52";
        $aeroport->destination = "Barcelone";
        $aeroport->vol = "KLM456";
        $aeroport->porte = "V54";
        $aeroport->observation = null;
        $aeroport->save();    
    }
}
