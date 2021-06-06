<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\DB;
function test($var){
    return $var." chuj";
}

class testowa{
    static function fun($var){
        $d = DB::table('players')->first();
        return print_r($d,true);
    }
}

class Form{
    static function getChecboxChecked($val){
        if(isset($val)&&(($val=='1') || (strtolower($val)=='on')))
            return " checked ";
        else
            return "";
    }
    
    static function saveImg($img, $path){
        
    }
    
}