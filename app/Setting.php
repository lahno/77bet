<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'view_block_games',
        'telegram_link',
        'fb_link',
        'vk_link',
        'instagram_link',
        'phone',
        'graph',
        'graph_num_1',
        'graph_num_2',
        'block_1_1',
        'block_1_2',
        'block_1_3',
    ];
}
