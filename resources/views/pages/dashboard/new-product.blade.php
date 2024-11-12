@extends('layouts.dashboard')
@section('title', 'Novo produto')

@section('content')
    <div class="container mt-5" style="min-height: 85vh">
        <h1>Novo produto</h1>
        <x-new-product-form />
    </div>
@endsection
