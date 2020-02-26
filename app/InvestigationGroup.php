<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationGroup extends Model
{
    public function units(){
        return $this->hasMany(Unit::class);
    }
}
