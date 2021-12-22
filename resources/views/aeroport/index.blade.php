@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="animate__animated animate__flipInX">Aéroport de Nice</h1>
            <a href="{{ route('aeroport.create') }}" class="btn btn-sm btn-primary float-right">Ajouter un départ</a><br>
            <hr>
            
            <livewire:aeroport.liste-depart/>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>

</script>

@endsection
