@extends('layouts.auth-layout')
@section('title', 'Login')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100%">
        <x-form-login />
    </div>
@endsection
