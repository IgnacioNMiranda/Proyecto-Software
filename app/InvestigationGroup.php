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
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
