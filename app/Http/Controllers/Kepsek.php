<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fouls;
use App\Models\Jenis;
use App\Models\Users;
use App\Models\Kelas;
use App\Models\Settings;
use App\Models\Ambilkelas;
use DB;
use PDF;
use Auth;

class Kepsek extends Controller{
    public function index(){
        $set = Settings::findorfail(1);
        $fls = Fouls::where('angkatans_id', $set->angkatans_id)->orderBy('created_at', 'desc')->paginate(20);
        return view('plg.awal', compact('fls'));
    }

    public function jmlpoin(){
        $fls = Fouls::orderBy('users_id', 'desc')->get();

        return view('plg.jmlpoin', compact('fls'));
    }

    public function jmlpoinsrc(Request $request){
        $fls = Fouls::orderBy('users_id')->join('users', 'fouls.users_id', '=', 'users.id')->where('users.name','like',"%".$request->cari."%")->paginate(10);

        return view('plg.jmlpoin', compact('fls'));
    }
}
