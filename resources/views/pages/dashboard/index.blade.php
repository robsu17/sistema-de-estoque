@extends('layouts.dashboard')
@section('title', 'Produtos')

@section('content')
    <div class="container mt-5" style="min-height: 85vh">
        @if(session('product_updated'))
            <div class="alert alert-success">
                {{ session('product_updated') }}
            </div>
        @endif
        @if(session('success.baixa'))
            <div class="alert alert-success">
                {{ session('success.baixa') }}
            </div>
        @endif
        <div class="d-flex flex-column gap-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    Adicionar
                </a>
            </div>
            <div class="d-flex flex-column gap-3">
                <x-filters />
                <x-products-table :products="$products" />
            </div>
        </div>
    </div>
@endsection
