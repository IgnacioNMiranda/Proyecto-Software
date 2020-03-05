<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name','slug'
    ];

    public function researchers(){
        return $this->belongsToMany(User::class);
    }

}
