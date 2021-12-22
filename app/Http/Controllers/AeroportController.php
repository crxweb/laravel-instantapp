<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeroport;

class AeroportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aeroport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aeroport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function show(Aeroport $aeroport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depart = Aeroport::find($id);
        return view('aeroport.edit', [
            'depart' => $depart
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aeroport $aeroport)
    {
        //
    }

    /**
     * Show the form for delete the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $depart = Aeroport::find($id);
        return view('aeroport.delete', [
            'depart' => $depart
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeroport $aeroport)
    {
        //
    }
}
