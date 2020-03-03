<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profiles extends Model
{
	use SoftDeletes;

    public function country()
    {
        return $this->belongsTo('App\Country', 'nationality_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
}
