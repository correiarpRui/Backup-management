<?php

namespace App\Traits;

trait CreatedUpdatedBy {

  public static function bootCreatedUpdatedBy(){
    if (auth()->check()){
      static::creating(function ($model){
        $model->created_by=auth()->id();
      });
    }
    if (auth()->check()){
      static::updating(function ($model){
        $model->updated_by=auth()->id();
      });
    }
  }

}