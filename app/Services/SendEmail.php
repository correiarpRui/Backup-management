<?php

namespace App\Services;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class SendEmail {
  public function createEmail($data){
    Mail::to('root@world.com')->send(new TestMail($data));
    return;
  }
}