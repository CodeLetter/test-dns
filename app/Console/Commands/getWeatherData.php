<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Weather;

class getWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getWeatherData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get WeatherData';

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
        $client = new \GuzzleHttp\Client(); 
        $result = $client->Get('https://opendata.cwb.gov.tw/api/v1/rest/datastore/W-C0033-001?Authorization=CWB-F1FC19DD-3A1A-4D7C-BD12-289C0A98ED12&format=JSON', [
            'Accept'=>'application/json',
            'headers' => ['Authorization'=>'CWB-F1FC19DD-3A1A-4D7C-BD12-289C0A98ED12'],
        ]);
        $json = $result->getBody()->getContents();
        $objs = json_decode($json,true);

        $dataArrays = $objs['records']['location'];

        foreach($dataArrays as $dataArray){
            $locationName = $dataArray['locationName'];
            $geocode = $dataArray['geocode'];
            $weather = new Weather;
            $weather->locationname = $locationName;
            $weather->geocode = $geocode;
            $weather->save();
        }
    }
}
