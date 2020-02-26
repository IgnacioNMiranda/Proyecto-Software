<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function investigationGroup(){
        return $this->belongsTo(InvestigationGroup::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
