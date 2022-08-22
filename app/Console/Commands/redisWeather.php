<?php

namespace App\Console\Commands;

use App\Weather;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class redisWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redisWeather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Input data to redis';

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
        $redis = app()->make('redis');

        $iniDatas = Weather::whereDate('created_at',Carbon::today())->get();
        foreach ($iniDatas as $iniData){
            $redis->sadd("name",$iniData->locationname);
            $redis->sadd("geo",$iniData->geocode);
            $redis->expire("name",540);
            $redis->expire("geo",540);
        }

        Log::info('hello redis999');
    }
}
