<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(Redis::get('a'));
        $userDatas = Auth::user()->All();
        //dd($userDatas);
        return view('page.user.home', compact('userDatas'));

    }
    public function search(Request $request)
    {
        $userDatas = Auth::user()
            ->where('name', '=', "$request->tableSearch")
            ->get();

        return view('page.user.home', compact('userDatas'));
        //return $request->tableSearch;
    }
    public function edit(Request $request, $id)
    {
        //dd($id);
        // $this->validate($request, [
        //     'title' => 'bail|required|unique:posts|max:255',
        // ]);

        
        $iniData = User::find($id);
        $userDatas = Auth::user()->All();
        
        $views=[
            'userDatas' => $userDatas,
            'tableId' => $iniData->id,
            'tableName' => $iniData->name,
            'tableEmail' => $iniData->email,
        ];
        
        return view('page.user.edit', $views);
    }

    public function update(Request $request, $id)
    {

        $userDatas = User::find($id);
        
        //dd($request);

        $userDatas->name=$request->input('name');

        $userDatas->email=$request->input('email');

        $userDatas->save();

        return redirect('/home');
    }

    public function delete($id)
    {
        $iniData = User::find($id);
        $userDatas = Auth::user()->All();
        
        $views=[
            'userDatas' => $userDatas,
            'tableId' => $iniData->id,
            'tableName' => $iniData->name,
            'tableEmail' => $iniData->email,
        ];
        //dd($views);
        
        return view('page.user.delete',$views);

    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/home');
    }

}
