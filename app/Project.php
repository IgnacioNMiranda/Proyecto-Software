<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Eloquent es un Orm, en vez de hacer queries se tratan como objetos las cosas, se recomienda usar en proyectos chicos
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

    public function scopeState($query,$state)
    {
        $states = config('options.states');
   
        if($state != "" && isset($states[$state])){
            $query->where('state',$state);
        }
    }

}
