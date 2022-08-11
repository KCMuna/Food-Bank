<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Purchase;
use App\Food;
class PlanExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planexpiry:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       

        $current_date=date('Y-m-d');
        $alllistings= Food::where('expiry_date',$current_date)->get();
        if(count($alllistings)>0){
            foreach($alllistings as $alllistingsnew){
                $data=Food::find($alllistingsnew->id);
                $data->status='0';
                $data->save();
            }
        }


       


    }


}
