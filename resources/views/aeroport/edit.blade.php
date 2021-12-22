@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
           <h1 class="animate__animated animate__flipInX">Aéroport de Nice - Modifier départ {{ $depart->id }}</h1>
            <a href="{{ route('aeroport.index') }}" class="btn btn-sm btn-primary float-right">Retour</a><br>
            <hr>
            
            <livewire:aeroport.update-depart :aeroport="$depart"/>
        </div>
    </div>
</div>
@endsection
