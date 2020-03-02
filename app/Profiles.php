<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    public function country()
    {
        return $this->hasOne('App\Country');
    }

    public function position()
    {
        return $this->hasOne('App\Position');
    }
}
