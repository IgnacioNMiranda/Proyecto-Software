<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationGroup extends Model
{
    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
