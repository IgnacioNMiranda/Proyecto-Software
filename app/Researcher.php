<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    protected $fillable = [
        'rut','name','state','country','unit_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function investigation_groups(){
        return $this->belongsToMany(InvestigationGroup::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
