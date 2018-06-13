<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email', 'rate_id', 'order_id', 'value', 'status', 'comment', 'code'
    ];

    public function rate()
    {
        return $this->hasOne('App\Rate', 'id', 'rate_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'email', 'user_email');
    }

}
