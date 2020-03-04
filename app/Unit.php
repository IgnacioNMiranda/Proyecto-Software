<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function researchers(){
        return $this->hasMany(User::class);
    }

    public function investigation_groups(){
        return $this->belongsToMany(investigationGroup::class);
    }
}
