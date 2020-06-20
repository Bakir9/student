<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'user_id','ip_address','start_activity','last_activity','action'
    ];

}
