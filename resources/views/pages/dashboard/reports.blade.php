@extends('layouts.dashboard')
@section('title', 'Relatórios')

@section('content')
    <div class="container my-5" style="min-height: 85vh">
        <h2 class="mb-3">Relatórios do Estoque</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Produtos no estoque</h5>
                <ul class="list-group">
                    @foreach($excessProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge text-bg-primary rounded-pill">{{ $product->quantity }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column gap-3">
            @foreach($locations as $location)
                <x-card-location :location="$location" />
            @endforeach
        </div>
    </div>
@endsection
