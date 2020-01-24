<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    //
     protected $guarded = ["id"];


  // public function user(){
  //   	return $this->belongsTo('App\User');
  //   }
    
     public function jurusan(){
        return $this->belongsTo('App\Jurusan');
    }
}
