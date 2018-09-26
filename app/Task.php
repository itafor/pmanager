<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable= [
        'name',
        'user_id',
        'project_id',
        'company_id',
        'days',
        'hours',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function companies(){
        return $this->belongsTo('App\Company');
    }

    public function projects(){
        return $this->belongsTo('App\Project');
    }

    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
        }
}
