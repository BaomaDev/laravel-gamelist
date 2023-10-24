@extends('layouts.master')

@section('judul')
    Add Game
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

<form method="POST" action="/game">
    @csrf
    <div class="form-group">
        <label>Game Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Developer</label>
        <input type="text" class="form-control" name="developer">
    </div>
    <div class="form-group">
        <label>Gameplay</label>
        <textarea name="gameplay" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Year</label>
        <input type="text" class="form-control" name="year">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @if(session('status') === 'success')
    <script>
    Swal.fire({
        title: "Berhasil!",
        text: "Game telah ditambahkan.",
        icon: "success",
        confirmButtonText: "Cool",
    });
    </script>
    @endif

@endsection