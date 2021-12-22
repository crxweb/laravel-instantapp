@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
           <h1 class="animate__animated animate__flipInX">Aéroport de Nice - Ajouter un départ</h1>
            <a href="{{ route('aeroport.index') }}" class="btn btn-sm btn-primary float-right">Retour</a><br>
            <hr>
            
            <livewire:aeroport.create-depart/>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>

</script>

@endsection
