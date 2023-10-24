@extends('layouts.master')

@section('judul')
    Edit Game
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/game/{{$game->id}}">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Game Name</label>
        <input type="text" class="form-control" name="name" value="{{$game->name}}">
    </div>
    <div class="form-group">
        <label>Developer</label>
        <input type="text" class="form-control" name="developer" value="{{$game->developer}}">
    </div>
    <div class="form-group">
        <label>Gameplay</label>
        <textarea name="gameplay" cols="30" rows="10" class="form-control">{{$game->gameplay}}</textarea>
    </div>
    <div class="form-group">
        <label>Year</label>
        <input type="text" class="form-control" name="year" value="{{$game->year}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
