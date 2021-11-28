<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Mapels;
use App\Models\Kelas;
use App\Models\Mapelkelas;
use App\Models\Jurusans;
use App\Models\Pns;
use App\Models\Golongans;
use Auth;
use PDF;

class Guru extends Controller{
    public function index(){
        $a       = '0';
        $guruno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->paginate(20);
        $guruyes = Mapels::where('kat', '0')->join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->paginate(20);
        $gno     = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->get();
        $gyes    = Mapels::join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->get();
        $jur     = Jurusans::all();
        $kat     = 'Umum';
        return view('list.guru', compact('guruno', 'gno', 'gyes', 'guruyes', 'jur', 'kat', 'a'));
    }

    public function gurukat($id){
        $a       = '0';
        $guruno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->paginate(20);
        $guruyes = Mapels::where('kat', $id)->join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->paginate(20);
        $gno     = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->get();
        $gyes    = Mapels::join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->get();
        $jur     = Jurusans::all();
        $kat     = Jurusans::select('nama')->where('id', $id)->get();
        foreach ($kat as $r) {
            $kat = $r->nama;
        }
        return view('list.guru', compact('guruno', 'guruyes', 'gno', 'gyes', 'jur', 'kat', 'a'));
    }

    public function gurusrc(Request $request){
        $a       = '1';
        $guruno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->where('name','like',"%".$request->cari."%")->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->where('name','like',"%".$request->cari."%")->paginate(20);
        $guruyes = Mapels::where('kat', '0')->join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->paginate(20);
        $gno     = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Mapels::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Mapels::select('users_id'))->get();
        $gyes    = Mapels::join('users', 'mapels.users_id', '=', 'users.id')->orderBy('users.name')->get();
        $jur     = Jurusans::all();
        $kat     = 'Umum';
        return view('list.guru', compact('guruno', 'guruyes', 'gno', 'gyes', 'jur', 'kat', 'a'));
    }

    public function pns(){
        $a      = 0;
        $b      = 0;
        $pnsno  = Users::orderBy('name')->where('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->paginate(10);
        $pnsyes = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->paginate(10);
        $pn     = Users::orderBy('name')->where('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->get();
        $py     = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->get();
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', 6)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->count();
        $ceno   = Users::where('levels_id', 6)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->count();
        $coyes  = Users::where('levels_id', 5)->where('jks', 1)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->where('jks', 1)->whereIn('id', Pns::select('users_id'))->count();
        $ceyes  = Users::where('levels_id', 5)->where('jks', 2)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->where('jks', 2)->whereIn('id', Pns::select('users_id'))->count();
        return view('list.pns', compact('a', 'pnsno', 'pnsyes', 'pn', 'py', 'b', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function pnsgol($id){
        $a      = 0;
        $b      = 1;
        $pnsno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Pns::select('users_id'))->paginate(10);
        $pnsyes = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->paginate(10);
        $pn     = Users::orderBy('name')->where('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->get();
        $py     = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->get();
        $hal    = Golongans::findorfail($id);
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', 6)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->count();
        $ceno   = Users::where('levels_id', 6)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->count();
        $coyes  = Users::where('levels_id', 5)->where('jks', 1)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->orWhere('levels_id', 6)->where('jks', 1)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->count();
        $ceyes  = Users::where('levels_id', 5)->where('jks', 2)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->orWhere('levels_id', 6)->where('jks', 2)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->count();
        return view('list.pns', compact('a', 'b', 'pnsno', 'pnsyes', 'pn', 'py', 'hal', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function pnsnosrc(Request $request){
        $a      = 1;
        $b      = 0;
        $pnsno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Pns::select('users_id'))->where('name','like',"%".$request->cari."%")->orWhere('levels_id', '5')->whereNotIn('id', Pns::select('users_id'))->where('name','like',"%".$request->cari."%")->paginate(10);
        $pnsyes = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->paginate(10);
        $pn     = Users::orderBy('name')->where('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->get();
        $py     = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->get();
        $gol    = Golongans::orderBy('nama')->get();
        $hal    = Golongans::findorfail('1');
        $cono   = Users::where('levels_id', 6)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->count();
        $ceno   = Users::where('levels_id', 6)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->count();
        $coyes  = Users::where('levels_id', 5)->where('jks', 1)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->where('jks', 1)->whereIn('id', Pns::select('users_id'))->count();
        $ceyes  = Users::where('levels_id', 5)->where('jks', 2)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->where('jks', 2)->whereIn('id', Pns::select('users_id'))->count();
        return view('list.pns', compact('a', 'b', 'pnsno', 'pnsyes', 'pn', 'py', 'gol', 'hal', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function pnsyessrc(Request $request){
        $pnsno  = Users::orderBy('name')->where('levels_id', '6')->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', '5')->whereNotIn('id', Pns::select('users_id'))->paginate(10);
        $pnsyes = Pns::join('users', 'pns.users_id', 'users.id')->orderBy('users.name')->where('name','like',"%".$request->cari."%")->where('levels_id', 6)->orWhere('levels_id', 5)->paginate(10);
        $pn     = Users::orderBy('name')->where('levels_id', 6)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', 5)->whereNotIn('id', Pns::select('users_id'))->get();
        $py     = Users::orderBy('name')->where('levels_id', 5)->whereIn('id', Pns::select('users_id'))->orWhere('levels_id', 6)->whereIn('id', Pns::select('users_id'))->get();
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', '6')->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', '5')->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->count();
        $ceno   = Users::where('levels_id', '6')->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orWhere('levels_id', '5')->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->count();
        $coyes  = Pns::whereIn('users_id', Users::select('id')->where('name','like',"%".$request->cari."%")->where('levels_id', 6)->orWhere('levels_id', 5))->paginate(10);
        $ceyes  = 1;
        return view('list.guru', compact('pnsno', 'pnsyes', 'pn', 'py', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function gurupnsstore(Request $request){
        if ($request->index == 0) {
            Pns::create([
                'id'           => $request->id,
                'users_id'     => $request->uid,
                'golongans_id' => $request->gol
            ]);
            return redirect()->back()->with('berhasil', 'Guru PNS berhasil ditambahkan.');
        }else{
            if ($request->id == NULL) {
                $nip = $request->uid;
            }else{
                $nip = $request->id;
            }
            $id = Pns::findorfail($request->uid);
            Pns::whereId($id->id)->update([
                'id'           => $nip,
                'golongans_id' => $request->gol
            ]);
            return redirect()->back()->with('berhasil', 'Data Guru PNS berhasil diubah.');
        }
    }

    public function wali(){
        $kls = Kelas::where('wali_id', Auth::user()->id)->orderBy('angkatans_id', 'desc')->get();
        return view('siswa.index', compact('kls'));
    }

    public function ctkjadwal(){
        $jadwal = Mapelkelas::whereIn('mapels_id', Mapels::select('id')->where('users_id', Auth::user()->id))->orderBy('hari')->get();
        $pns    = Pns::where('users_id', Auth::user()->id)->first();
        return PDF::loadview('guru.cetakjadwal', compact('jadwal', 'pns'))->setPaper('A4')->stream();
    }
}
