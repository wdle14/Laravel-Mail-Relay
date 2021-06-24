<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SentMailController extends Controller
{
    // private $details;

    public function index(){

        $details['MAIL_TO'] = 'andrinett@gmail.com';
        $details['APP_NAME'] = 'CObAIN';
        $details['SUBJECT'] = 'Makan Gratis';
        $details['BODY'] = '<h1>jasjdajajsd</h1>';
  
        dispatch(new \App\Jobs\SendMailJob($details));
  
    }

    public function test(){
        
    }
}
