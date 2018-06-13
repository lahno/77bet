<?php

namespace App\Http\Controllers\Account;

use App\Code;
use App\Http\Controllers\SiteController;
use App\Http\Requests\AddPaymentPost;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends SiteController
{
    public function __construct(Request $request)
    {
        Log::info('Отправка Insert Deposit: '.implode(", ", $request->all()).PHP_EOL.'IP: '.$request->ip());
    }

    public function add_pay(AddPaymentPost $request){
        Log::info('IP: '.$request->ip().' Валидация insert_deposit успешна!');

        $order_id = Carbon::now()->format('ymdhis').strval((Auth::id())?'_'.Auth::id():''.'_'.$request->rate_id);

        $merchant_id = env('FREE_KASSA_ID');
        $secret_word = env('FREE_KASSA_SECRET');
        $order_amount = $request->value;
        $s = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$order_id);

        $payment = Transaction::updateOrCreate(
            ['order_id' => $order_id],
            [
                'user_email' => $request->user_email,
                'rate_id' => $request->rate_id,
                'order_id' => $order_id,
                'value' => $order_amount,
                'code' => $request->promo_code,
                'status' => 'created',
                'comment' => $request->comment
            ]
        );

        if ($request->promo_code && $payment->code){
            Code::where('code', $request->promo_code)->update(['used' => 1]);
        }

        Log::info('DATA insert DB insert_deposit: '.$payment.PHP_EOL.'IP: '.$request->ip());

        if ($payment){
            return ['status' => true, 'data' => [
                'order_id' => $payment->order_id,
                'rate_id' => $payment->rate_id,
                'value' => $payment->value,
                'code' => $request->promo_code,
                's' => $s,
                'em' => $request->user_email
            ]];
        }
        return ['status' => false];
    }

    public function set_promo_code(Request $request){
        if ($request->promo_code){
            $code = Code::where('code', $request->promo_code)->where('used', '0')->first();
            if ($code){
                return ['status' => true, 'value' => $code->value];
            }else{
                return ['status' => false];
            }
        }
        return ['status' => false];
    }

}
