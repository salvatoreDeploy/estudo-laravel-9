@extends('layouts.app')

@section('title', 'Detalhes')

@section('content')
    <h1>Detalhes do Usuario: {{ $user->name }}</h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>

    <a href="{{ route('users.create') }}">Novo</a>
@endsection
