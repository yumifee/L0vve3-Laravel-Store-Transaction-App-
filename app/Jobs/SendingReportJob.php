<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendingReport;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use PDF;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SendingReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    // public $mailData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    // public function __construct($mailData)
    // {
    //     $this->mailData = $mailData;
    // }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        $product = Product::all();
        $data = [
            'title' => 'Laporan Stok Barang',
            'date' => date('d/m/Y'),
            'product' => $product
        ];
        $pdf = PDF::loadView('productspdf', $data);

        foreach($users as $user){
            Mail::to($user->email)->send(new SendingReport($pdf));
        }
    }
}
