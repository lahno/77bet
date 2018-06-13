<?php

namespace App\Http\Controllers\Account;

use App\Code;
use App\Http\Controllers\SiteController;
use App\Http\Requests\AddPromoCodesPost;
use App\Http\Requests\AddRateAccountsPost;
use App\Http\Requests\EditEmailAccountsPost;
use App\Http\Requests\EditNameAccountsPost;
use App\Http\Requests\EditPasswordAccountsPost;
use App\Http\Requests\EditPhoneAccountsPost;
use App\Rate;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends SiteController
{
    public function __construct()
    {

    }

    public function edit_name(EditNameAccountsPost  $request){
        $user = User::where('id', Auth::id())->update(['name' => $request->new_name]);
        if($user){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function edit_email(EditEmailAccountsPost $request){
        $user = User::where('id', Auth::id())->update(['email' => $request->new_email]);
        if($user){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function edit_phone(EditPhoneAccountsPost $request){
        $user = User::where('id', Auth::id())->update(['phone' => $request->new_phone]);
        if($user){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function edit_password(EditPasswordAccountsPost $request){
        $user = User::where('id', Auth::id())->update(['password' => bcrypt($request->new_password)]);
        if($user){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    /*
     * RATE
     */
    public function add_rate(AddRateAccountsPost $request){
        $rate = Rate::create($request->all());
        if($rate){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function edit_rate(AddRateAccountsPost $request, $rate_id){
        $rate = Rate::where('id', $rate_id)->first();
        if($rate){
            $rate->update($request->all());
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function delete_rate($rate_id){
        $rate = Rate::where('id', $rate_id)->first();
        if($rate){
            $rate->delete();
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    /*
     * PROMO CODE
     */
    public function add_promo_code(AddPromoCodesPost $request){
        $promo_code = Code::create($request->all());
        if($promo_code){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function edit_promo_code(AddPromoCodesPost $request, $code_id){
        $promo_code = Code::where('id', $code_id)->first();
        if($promo_code){
            $promo_code->update($request->all());
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    public function delete_promo_code($code_id){
        $promo_code = Code::where('id', $code_id)->first();
        if($promo_code){
            $promo_code->delete();
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }

    /*
     * SETTINGS
     */
    public function edit_settings(Request $request){
        $settings = Setting::select('*')->first();
        if($settings){
            $settings->update($request->all());
            return redirect('settings')->with('save_settings', 'Настройки сохранены');
        }else{
            return redirect('settings')->with('save_settings', 'Ошибка сохранения!');
        }
    }


}
