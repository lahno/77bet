<?php

namespace App\Http\Controllers;

use App\Setting;

class SiteController extends Controller
{
    protected $template;
    protected $vars = [];

    public function __construct()
    {
        //
    }

    protected function renderOutput(){

        $settings = Setting::first();

        if ($settings){
            $header = view('layouts.header')->with('settings', $settings)->render();
            $footer = view('layouts.footer')->with('settings', $settings)->render();
            $scripts = view('layouts.scripts')->with('settings', $settings)->render();
        }else{
            $header = view('layouts.header')->with('settings', false)->render();
            $footer = view('layouts.footer')->with('settings', false)->render();
            $scripts = view('layouts.scripts')->with('graph', false)->render();
        }


        $this->vars = array_add($this->vars, 'header', $header);

        $modals = view('layouts.modals')->render();
        $this->vars = array_add($this->vars, 'modals', $modals);

        $this->vars = array_add($this->vars, 'footer', $footer);

        $this->vars = array_add($this->vars, 'scripts', $scripts);

        return view($this->template)->with($this->vars);
    }

}