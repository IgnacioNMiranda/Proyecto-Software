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
    
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function investigation_group(){
        return $this->belongsTo(InvestigationGroup::class);
    }
}
