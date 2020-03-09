<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'code','name','state','startDate','endDate','slug','investigation_group_id'
    ];

    public function researchers(){
        return $this->belongsToMany(Researcher::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
