<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'code','name','state','startDate','endDate','slug','investigation_group_id'
    ];

    public function researchers(){
        return $this->belongsToMany(Researcher::class)->withTimestamps();
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function investigation_group(){
        return $this->belongsTo(InvestigationGroup::class);
    }
}
