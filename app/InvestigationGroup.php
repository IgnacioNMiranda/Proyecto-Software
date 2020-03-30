<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationGroup extends Model
{
    protected $fillable = [
        'name', 'logo', 'slug',
    ];

    public function units(){
        return $this->belongsToMany(Unit::class)->withTimestamps();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function researchers(){
        return $this->belongsToMany(Researcher::class)->withTimestamps();
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function publications(){
        return $this->hasMany(Publication::class);
    }


}
