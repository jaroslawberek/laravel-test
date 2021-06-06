<?php

//April 2, 2021, 11:47 pm
namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //protected $table='';
     protected $fillable = ['avatar','login','wzrost','canLogin','description','born','sex','position'];         
     //Relacje  
     
public function logowanias()
{
   return $this->hasMany(Logowania::class,'player_id','id');
}
     
}
