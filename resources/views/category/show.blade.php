@extends('layouts.master')

@section('judul')
    Show Game
@endsection

@section('content')
<a href="/game/create" class="btn btn-primary my-3">Add Game</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($games as $key => $game)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$game->name}}</td>
            <td>
                <form action="/game/{{$game->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/game/{{$game->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/game/{{$game->id}}/edit" class="btn btn-secondary btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No games available.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
