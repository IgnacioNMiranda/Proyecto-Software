<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'date', 'slug', 'investigation_group_id', 'project_id'
    ];

    public function researchers(){
        return $this->belongsToMany(Researcher::class)->withTimestamps();
    }
    
    public function projects(){
        return $this->belongsTo(Project::class);
    }

    public function invGroups(){
        return $this->belongsTo(InvestigationGroup::class);
    }
}
