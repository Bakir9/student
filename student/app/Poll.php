<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'question','user_id','start_at','end_at','isActive'
    ];

    public function option_polls()
    {
        return $this->hasMany('App\Option_Poll');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
