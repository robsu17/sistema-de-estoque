@extends('layouts.dashboard')
@section('title', 'Detalhes')

@section('content')
    <div class="container mt-5 mb-5" style="min-height: 85vh">
        <h1 class="mb-3">Editar produto</h1>
        <x-edit-product-form :product="$product" />
    </div>
@endsection
