<?php

namespace App\Http\Controllers;

use App\Game;
use App\Rate;
use App\Setting;

class IndexController extends SiteController
{
    public function __construct()
    {
        $this->template = 'index';
    }

    public function index(){
        $rates = Rate::all();
        $games = Game::all();
        $settings = Setting::first();
        $this->vars = array_add($this->vars, 'rates', $rates);
        $this->vars = array_add($this->vars, 'games', $games);
        $this->vars = array_add($this->vars, 'settings', $settings);
        return $this->renderOutput();
    }
}
