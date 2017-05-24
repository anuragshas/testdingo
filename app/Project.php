<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='projects';

    protected $fillable = ['id','name','customer'];

    public function user(){
        return $this->belongsToMany('App\User','project_user');
    }
}
