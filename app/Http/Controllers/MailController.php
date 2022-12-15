<?php
  
namespace App\Http\Controllers;

use App\Jobs\SendingReportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendingReport;
use Illuminate\Support\Carbon;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendEmail()
    {
        dispatch(new SendingReportJob());
           
        dd("Email is sent successfully.");
    }

    // public function sendEmail()
    // {
    //     Mail::to('nazwaaca02@gmail.com')->send(new SendingReport());
    //     echo 'email sent';
    // }


    
}