<?php

namespace App\Http\Controllers\Account;

use App\Game;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;

class GameController extends SiteController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->template = 'account.games';
    }

    public function index(){
        $games = Game::all();

        $this->vars = array_add($this->vars, 'games', $games);
        return $this->renderOutput();
    }

    public function add_game(Request $request){

        $file_name = uniqid().$request->file('img')->getClientOriginalName();

        $request->file('img')->move(public_path('thumb/items'), $file_name);

        $data = $request->except(['img']);

        $data['img'] = '/thumb/items/' . $file_name;

        $game = new Game;

        $game->competition = $request->competition;
        $game->title = $request->title;
        $game->date = $request->date;
        $game->img = $data['img'];
        if ($request->link){
            $game->link = $request->link;
        }
        $game->save();
        return back()->withInput();
    }

    public function edit_game(Request $request, $game_id){
        $game = Game::where('id', $game_id)->first();

        $file_name = uniqid().$request->file('img')->getClientOriginalName();

        $request->file('img')->move(public_path('thumb/items'), $file_name);

        $data = $request->except(['img']);

        $data['img'] = '/thumb/items/' . $file_name;

        $game->competition = $request->competition;
        $game->title = $request->title;
        $game->date = $request->date;
        $game->img = $data['img'];
        if ($request->link){
            $game->link = $request->link;
        }
        $game->save();
        return back()->withInput();
    }

    public function delete_game($game_id){
        $game = Game::where('id', $game_id)->first();
        if($game){
            $game->delete();
        }
        return back()->withInput();
    }

}
