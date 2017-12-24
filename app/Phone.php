<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /*public function getPhoneAttribute($value){
        $value=ucfirst($value);
        if(strlen($value)>5){
            $value=substr($value,0,5).".....";
        }
        return ucfirst($value);
    }

    public function setPhoneAttribute($value){
        $this->attributes["phone"]=strtolower($value);
    }*/
}
