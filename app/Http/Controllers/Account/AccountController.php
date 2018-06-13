<?php

namespace App\Http\Controllers\Account;

use App\Code;
use App\Http\Controllers\SiteController;
use App\Rate;
use App\Setting;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends SiteController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->template = 'account.account';
    }

    public function index(){
        if (Auth::user()->adm){
            $purchase = Transaction::all();
        }else{
            $purchase = Transaction::where('user_email', Auth::user()->email)->get();
        }

        if($purchase){
            $purchase->load('rate', 'user');
        }

        $this->vars = array_add($this->vars, 'purchase', $purchase);
        return $this->renderOutput();
    }

    public function rates(){
        $this->template = 'account.rates';

        $rates = Rate::all();
        $this->vars = array_add($this->vars, 'rates', $rates);
        return $this->renderOutput();
    }

    public function promo_codes(){
        $this->template = 'account.promo_codes';

        $codes = Code::all();
        $this->vars = array_add($this->vars, 'codes', $codes);
        return $this->renderOutput();
    }

    public function settings()
    {
        $this->template = 'account.settings';

        $settings = Setting::select('*')->first();
        $this->vars = array_add($this->vars, 'settings', $settings);
        return $this->renderOutput();
    }
}
