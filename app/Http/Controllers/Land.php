<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Tentangs;
use App\Models\Profils;
use App\Models\Kegiatans;
use App\Models\Socs;
use App\Models\Imgacts;
use App\Models\Pgs;
use App\Models\Kelas;
use App\Models\Ambilkelas;
use App\Models\Users;
use App\Models\Pns;
use App\Models\News;

class Land extends Controller{
    public function index(){
        $index = 0;
        $set   = Settings::findorfail(1);
        $abt   = Tentangs::findorfail(1);
        $prof  = Profils::all();
        $act   = Kegiatans::inRandomOrder()->get();
        $news  = News::orderBy('id', 'desc')->paginate(5);        
        $m     = Socs::findorfail(1);
        
        if ($m->yt != NULL) {
            $sosin = 1;
        }elseif ($m->fb != NULL) {
            $sosin = 1;
        }elseif ($m->tw != NULL) {
            $sosin = 1;
        }elseif ($m->ig != NULL) {
            $sosin = 1;
        }else{
            $sosin = 0;
        }

        $akt     = Settings::findorfail(1);

        $kx      = Kelas::where('tingkat', 1)->where('angkatans_id', $akt->angkatans_id)->get();
        $j       = 0;
        if ($kx->isEmpty()) {
            $jx = 0;
        }else{
            foreach ($kx as $r) {
                $x   = Ambilkelas::where('kelas_id', $r->id)->count();
                $j   = $j + $x;
            }
            $jx      = $j;
        }
        

        $kxi     = Kelas::where('tingkat', 2)->where('angkatans_id', $akt->angkatans_id)->get();
        $j       = 0;
        if ($kxi->isEmpty()) {
            $jxi = 0;
        }else{
            foreach ($kxi as $r) {
                $xi = Ambilkelas::where('kelas_id', $r->id)->count();
                $j  = $j + $xi;
            }
            $jxi     = $j;
        }

        $kxii    = Kelas::where('tingkat', 3)->where('angkatans_id', $akt->angkatans_id)->get();
        $j       = 0;
        if ($kxii->isEmpty()) {
            $jxii = 0;
        }else{
            foreach ($kxii as $r) {
                $xii = Ambilkelas::where('kelas_id', $r->id)->count();
                $j   = $j + $xii;
            }
            $jxii    = $j;
        }

        $jml     = $jx + $jxi + $jxii;
        if ($jml == 0) {
            $px   = 0;
            $pxi  = 0;
            $pxii = 0;
        }else{
            $px   = round($jx / $jml * 100);
            $pxi  = round($jxi / $jml * 100);
            $pxii = round($jxii / $jml * 100);
        }

        $gp  = Users::where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->count();
        $gn  = Users::where('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->count();
        $jml = $gp + $gn;
        if ($jml == 0) {
            $pgp = 0;
            $pgn = 0;
        }else{
            $pgp = round($gp / $jml * 100);
            $pgn = round($gn / $jml * 100);
        }

        $pp  = Users::where('levels_id', 7)->whereIn('id', Pns::select('users_id'))->count();
        $pn  = Users::where('levels_id', 7)->whereNotIn('id', Pns::select('users_id'))->count();
        $jml = $pp + $pn;
        if ($jml == 0) {
            $ppp = 0;
            $ppn = 0;
        }else{
            $ppp = round($pp / $jml * 100);
            $ppn = round($pn / $jml * 100);
        }
        
        return view('land.index', compact('index', 'set', 'abt', 'prof', 'act', 'news', 'm', 'sosin', 'jx', 'jxi', 'jxii', 'px', 'pxi', 'pxii', 'gp', 'gn', 'pgp', 'pgn', 'pp', 'pn', 'ppp', 'ppn'));
    }

    public function show($id){
        $index = 1;
        $set   = Settings::findorfail(1);
        $prof  = Profils::all();
        $cont  = Profils::where('judul', $id)->first();
        $kgt   = Kegiatans::where('nama', $id)->first();
        $news  = News::where('judul', $id)->first();
        $act   = Kegiatans::all();
        $m     = Socs::findorfail(1);
        if ($m->yt != NULL) {
            $sosin = 1;
        }elseif ($m->fb != NULL) {
            $sosin = 1;
        }elseif ($m->tw != NULL) {
            $sosin = 1;
        }elseif ($m->ig != NULL) {
            $sosin = 1;
        }else{
            $sosin = 0;
        }

        if ($cont != NULL) {
            return view('land.prof', compact('index', 'set', 'cont', 'prof', 'act', 'm', 'sosin'));
        }elseif ($kgt != NULL) {
            $img = Imgacts::where('kegiatans_id', $kgt->id)->get();
            $pgs = Pgs::where('users_id', $kgt->users_id)->first();
            return view('land.act', compact('index', 'set', 'prof', 'kgt', 'act', 'm', 'sosin', 'img', 'pgs'));
        }elseif($news != NULL){
            return view('land.news', compact('index', 'set', 'cont', 'prof', 'act', 'm', 'sosin', 'news'));
        }
    }
}
