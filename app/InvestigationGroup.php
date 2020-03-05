<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationGroup extends Model
{
    protected $fillable = [
        'name', 'logo', 'slug',
    ];

    public function units(){
        return $this->hasMany(Unit::class);
    }
}
