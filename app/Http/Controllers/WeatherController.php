<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iniDatas = Weather::whereDate('created_at',Carbon::today())->orderBy('id','desc')->take(22)->get();
        //dd($iniDatas);
        return view("page.user.weather", compact('iniDatas'));
    }

    public function search(Request $request)
    {
        $searchText = $request->searchText;

            switch ($request->date) {
                case "0":
                    $iniDatas = Weather::whereDate('created_at',"=", Carbon::yesterday())
                        ->where('locationname', 'like', "%$searchText%")
                        ->orderBy('id', 'desc')
                        ->take(22)
                        ->get();
                    return view("page.user.weather", compact('iniDatas'));
                    break;
                case "1":
                    $iniDatas = Weather::whereDate('created_at',"=", Carbon::today())
                        ->where('locationname', 'like', "%$searchText%")
                        ->orderBy('id', 'desc')
                        ->take(22)
                        ->get();
                    return view("page.user.weather", compact('iniDatas'));
                    break;
                case "2":
                    $iniDatas = Weather::whereMonth('created_at', '=', date("m"))
                        ->where('locationname', 'like', "%$searchText%")
                        ->orderBy('id', 'desc')
                        ->get();
                    return view("page.user.weather", compact('iniDatas'));
                    break;
                case "3":
                    $iniDatas = Weather::whereMonth('created_at', '=', date("m") - 1)
                        ->where('locationname', 'like', "%$searchText%")
                        ->orderBy('id', 'desc')
                        ->get();
                    return view("page.user.weather", compact('iniDatas'));
                    break;
                default:
                    return view("page.user.weather");
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $redis = app()->make('redis');
//        $redis->set("k","123");
//        $redis->setex('j',60,"hhh");
//
//        return $redis->get("j");
        //print_r(app()->make('redis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // $client = new \GuzzleHttp\Client();
    // $result = $client->Get('https://opendata.cwb.gov.tw/api/v1/rest/datastore/W-C0033-001?Authorization=CWB-F1FC19DD-3A1A-4D7C-BD12-289C0A98ED12&format=JSON', [
    //     'Accept'=>'application/json',
    //     'headers' => ['Authorization'=>'CWB-F1FC19DD-3A1A-4D7C-BD12-289C0A98ED12'],
    // ]);
    // $json = $result->getBody()->getContents();
    // $objs = json_decode($json,true);

    // $dataArrays = $objs['records']['location'];

    // foreach($dataArrays as $dataArray){
    //     $locationName = $dataArray['locationName'];
    //     $geocode = $dataArray['geocode'];
    //     $weather = new Weather;
    //     $weather->locationname = $locationName;
    //     $weather->geocode = $geocode;
    //     $weather->save();
    // }

    /////////////////////////////////////////////////
//        $redis = app()->make('redis');
//
//        $iniDatas = Weather::whereDate('created_at',Carbon::today())->get();
//        foreach ($iniDatas as $iniData){
//            $redis->sadd("name",$iniData->locationname);
//            $redis->sadd("geo",$iniData->geocode);
//            $redis->expire("name",60);
//            $redis->expire("geo",60);
//        }
    //return $redis->get("name");
    //dd($redis->smembers("name"));

//        foreach($iniDatas as $iniData){
//            print_r($iniData->locationname);
//            print_r($iniData->geocode);
//        }

    //dd($iniData);
}
