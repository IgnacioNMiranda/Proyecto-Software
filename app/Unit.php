<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name', 'country', 'slug',
    ];

    public function researchers(){
        return $this->hasMany(Researcher::class);
    }

    public function investigation_groups(){
        return $this->belongsToMany(investigationGroup::class)->withTimestamps();
    }
}
