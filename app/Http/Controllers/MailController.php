<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendingReport;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Pemberitahuan KPU',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('nazwaaca02@gmail.com')->send(new SendingReport($mailData));
           
        dd("Email is sent successfully.");
    }

    
}