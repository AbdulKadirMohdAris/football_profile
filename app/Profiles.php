<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country', 'nationality_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
}
