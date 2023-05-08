@extends('layouts.master')

@section('contenu')

    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->nom }} {{ $user->prenom }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
@endsection