@extends('layouts.dashboard')

@section('title', 'Movimentações')

@section('content')
    <div class="container my-5" style="min-height: 85vh">
        <h1 class="mb-5">Relatórios de movimentações</h1>
        <x-movements-table :movements="$stockMovements" />
    </div>
@endsection
