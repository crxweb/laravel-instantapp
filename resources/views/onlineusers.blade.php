@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="animate__animated animate__flipInX">Liste des utilisateurs connectés</h1>
            <hr>
            @livewire('online.users', ['id' => "web", 'render' => true ])
        </div>
    </div>
</div>

@endsection


