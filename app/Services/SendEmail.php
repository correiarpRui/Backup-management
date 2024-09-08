<?php

namespace App\Services;

use App\Mail\RestoreMail;
use Illuminate\Support\Facades\Mail;

class SendEmail {
  public function createEmail($data){
    Mail::to('root@world.com')->send(new RestoreMail($data));
    return;
  }
}