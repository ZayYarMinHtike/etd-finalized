<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function scopeSearch($query, $q) {
        return $query->where('title','LIKE','%'.$q.'%')
        ->orWhere('name','LIKE','%'.$q.'%')
        ->orWhere('batch','LIKE','%'.$q.'%')
        ->orWhere('tags','LIKE','%'.$q.'%')
        ->orWhere('topic','LIKE','%'.$q.'%')
        ->orWhere('year','LIKE','%'.$q.'%')
        ->orWhere('company','LIKE','%'.$q.'%')
        ->orWhere('supervisor','LIKE','%'.$q.'%')
        ->orWhere('abstract','LIKE','%'.$q.'%');
    }   
}
