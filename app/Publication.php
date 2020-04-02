<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title','titleSecondLanguage','publicationType','publicationSubType','type','date','slug','investigation_group_id', 'project_id'
    ];

    public function researchers(){
        return $this->belongsToMany(Researcher::class)->withTimestamps();
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function invGroups(){
        return $this->belongsTo(InvestigationGroup::class);
    }


    public function scopePublicationType($query,$publicationType)
    {
        $publicationTypes = config('publicationTypes.Types');

        if($publicationType != "" && isset($publicationTypes[$publicationType])){
            $query->where('publicationType',$publicationType);
        }
    }

}
