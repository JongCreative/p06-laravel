<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ='posts';
    protected $primaryKey ='post_id';
    protected $timestamp =true;

    public function user(){
        //has a relationship with the user & this single post belongs to a user
        return $this->belongsTo('App\User');
    }

}
