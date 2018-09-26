<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname', 
        'email', 
        'phone',
        'stdaddress',
        'maritalstatus',
        
    ];
    public function subject(){
        return $this->hasMany('App\Subject');
    }
}
