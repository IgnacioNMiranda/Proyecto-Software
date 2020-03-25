<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    protected $fillable = [
        'rut','researcher_name','state','country','unit_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function investigation_groups(){
        return $this->belongsToMany(InvestigationGroup::class)->withTimestamps();
    }

    public function projects(){
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    //Scopes
    public function scopeCountry($query, $country){
        if($country){
            return $query->where('country','LIKE',"%$country%");
        }
    }
    public function scopeUnit($query, $unit_id){
        if($unit_id){
            return $query->where('unit_id', '=', "$unit_id");
        }
    }

}
