@extends('layouts/dashboard')

@section('content')
    <h1>Ciao {{ $user->name }}, sono l'Admin Home Page</h1>
    <h2>Phone Number: +39{{ $user->userInfo->phone_number }}</h2>
    <h2>Address: {{ $user->userInfo->address }}</h2>
    <h2>Age: {{ $user->userInfo->age }} years old</h2>
@endsection
