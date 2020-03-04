<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function researchers(){
        return $this->belongsToMany(User::class);
    }
}
