<?php

namespace App\Console\Commands;

use App\Models\offer;
use Illuminate\Console\Command;
use App\services\productOffersService;
use Illuminate\Support\Facades\Notification;
use App\Notifications\productOfferCancelNotification;

class OfferExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:expire';

    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'product offers expire ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
   
        $offer= offer::where('status',2)->where('end_date','>',today())->get();
            $offer->update([
                'status'=>3,
                   ]); 
                   Notification::send(FactorySalesRecipients(), new productOfferCancelNotification($offer));
    
        
    }
}
