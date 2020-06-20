<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Job extends Model
{
    protected $fillable = [
        'user_id','job_title','type_of_job','level','content','company','e_mail','image','location','address','valid_until'
    ];
    protected $casts = [
        'type_of_job' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
