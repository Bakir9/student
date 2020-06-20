<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option_Poll extends Model
{
    protected $table = 'option_polls';

    protected $fillable = [
        'poll_id','option'
    ];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
}
//$post->comments()->createMany([[ 'message' => 'A new comment.',],['message' => 'Another new comment.',],]);
