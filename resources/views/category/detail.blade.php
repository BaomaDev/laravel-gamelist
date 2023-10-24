@extends('layouts.master')

@section('judul')
    Detail Game
@endsection

@section('content')
<h1>{{$game->name}}</h1>
<p>Developer: {{$game->developer}}</p>
<p>Gameplay: {{$game->gameplay}}</p>
<p>Year: {{$game->year}}</p>
@endsection
