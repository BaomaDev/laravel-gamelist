<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;

class GameController extends Controller
{
    public function create()
    {
        return view('category.game');
    }

    public function index()
    {
        $games = DB::table('games')->get();
        return view('category.show', ['games' => $games]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'developer' => 'required',
            'gameplay' => 'required',
            'year' => 'required|integer',
        ]);

        DB::table('games')->insert([
            'name' => $request->input('name'),
            'developer' => $request->input('developer'),
            'gameplay' => $request->input('gameplay'),
            'year' => $request->input('year'),
        ]);

        return redirect('/game')->with('status', 'success');
    }

    public function show($id)
    {
        $game = DB::table('games')->find($id);
        return view('category.detail', ['game' => $game]);
    }

    public function edit($id)
    {
        $game = DB::table('games')->find($id);
        return view('category.edit', ['game' => $game]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'developer' => 'required',
            'gameplay' => 'required',
            'year' => 'required|integer',
        ]);

        DB::table('games')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'developer' => $request->input('developer'),
                'gameplay' => $request->input('gameplay'),
                'year' => $request->input('year'),
            ]);

        return redirect('/game');
    }

    public function destroy($id)
    {
        DB::table('games')->where('id', $id)->delete();
        return redirect('/game');
    }
}
