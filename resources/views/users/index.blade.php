@extends('layouts.app')

@section('title', 'Listagem de Usuarios')

@section('content')
    <h1>Lista de Usuarios</h1>

    <ul>
        @foreach($users as $user)
            <li>
                Nome: {{ $user->name }}
                Email: {{ $user->email }}
                | <a href="{{ route('users.show', ['id' => $user->id]) }}">Detalhes</a> |
                <a href="{{ route('users.edit', ['id' => $user->id]) }}">Editar</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('users.create') }}">Novo</a>
@endsection
