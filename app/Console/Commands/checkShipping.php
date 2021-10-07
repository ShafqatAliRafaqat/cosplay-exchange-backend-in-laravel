<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\Costumes;
use App\Models\Exchange;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkShipping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:shipping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if item is shipped within 48hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Costumes::where('request_status',1)->get() as $costume)
        {
            foreach($costume->exchanges()->whereDate('deadline','<',Carbon::now())->get() as $exchange)
            {
                if ($exchange->shipping==null)
                {
                    //refund the requester, remove shipping&requests, costume to show back in front page
                    $coin=Coin::where('user_id',$exchange->user_id)->first();
                    $coin->available_coins+=$exchange->costumes->price;
                    $coin->save();
                    $costume=Costumes::find($exchange->costumes_id);
                    $costume->request_status=0;
                    $costume->save();
                    foreach (Exchange::where('costumes_id',$exchange->costumes_id)->get() as $allExchangeRequests)
                    {
                        $allExchangeRequests->delete();
                    }
                }
            }
        }
    }
}
