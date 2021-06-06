<?php

//April 3, 2021, 7:59 pm
namespace App;

use Illuminate\Database\Eloquent\Model;

class Logowania extends Model
{
    //protected $table='';
     protected $fillable = ['player_id','dodano','user_id'];         
     //Relacje  
     
     
public function players()
{
   return $this->belongsTo(Player::class,'player_id','id');
}

public function users()
{
   return $this->belongsTo(User::class,'user_id','id');
}

}
