<?php

namespace App\Traits;

trait UserStamps {

  public static function bootUserStamps(){
    if (auth()->check()){
      static::creating(function ($model){
        $model->created_by=auth()->id();
      });
    }
  }

}