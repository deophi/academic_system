<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Levels;
use App\Models\Fouls;
use App\Models\Jenis;
use App\Models\Jurusans;
use App\Models\Settings;
use App\Models\Ambilkelas;
use App\Models\Mapelkelas;
use App\Models\Mapels;
use App\Models\Kelas;
use App\Models\Surattugas;
use Carbon\Carbon;

class Dash extends Controller{
    public function index(){
        $set = Settings::findorfail(1);
        $lgr = Fouls::where('angkatans_id', $set->angkatans_id)->orderBy('created_at', 'desc')->paginate(5);
        
        if (Auth::user()->levels_id == 1) {
            $user = Users::orderBy('created_at', 'desc')->where('levels_id', '2')->orWhere('levels_id', '3')->paginate(10);
            $js  = Users::where('levels_id', 8)->count();
            $jg  = Users::where('levels_id', 6)->orWhere('levels_id', '5')->count();
            $jt  = Users::where('levels_id', 7)->count();
            $ju  = Users::where('id', '!=', 12345678)->count();
            return view('dash.dashboard', compact('user', 'js', 'jg', 'jt', 'lgr', 'ju'));
        }elseif (Auth::user()->levels_id < 4) {
            return view('dash.dashboard');
        }elseif (Auth::user()->levels_id == 4) {
            $thn = Carbon::now()->format('Y');
            $srt = Surattugas::whereYear('waktu', $thn)->orderBy('idkeluar', 'desc')->paginate(10);
            $js  = Users::where('levels_id', 8)->count();
            $jg  = Users::where('levels_id', 6)->orWhere('levels_id', '5')->count();
            $jt  = Users::where('levels_id', 7)->count();
            $ju  = Users::where('id', '!=', 12345678)->count();
            return view('dash.dashboard', compact('js', 'jg', 'jt', 'ju', 'lgr', 'srt'));
        }elseif (Auth::user()->levels_id == 8) {
            $fls    = Fouls::where('users_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->orderBy('created_at', 'desc')->paginate(10);
            $kls    = Ambilkelas::where('users_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->first();
            if ($kls == NULL) {
                return view('dash.dashboard', compact('lgr', 'fls', 'kls'));
            }else{
                $plj    = Mapelkelas::where('kelas_id', $kls->kelas_id)->get();
                $senin  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 1)->orderBy('awal')->get();
                $selasa = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 2)->orderBy('awal')->get();
                $rabu   = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 3)->orderBy('awal')->get();
                $kamis  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 4)->orderBy('awal')->get();
                $jumat  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 5)->orderBy('awal')->get();
                $sabtu  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', 6)->orderBy('awal')->get();

                return view('dash.dashboard', compact('fls', 'kls', 'plj', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'));
            }
        }elseif (Auth::user()->levels_id < 7) {
            $jadwal = Mapelkelas::whereIn('mapels_id', Mapels::select('id')->where('users_id', Auth::user()->id))->orderBy('hari')->get();
            $kls    = Kelas::where('wali_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->orderBy('angkatans_id', 'desc')->first();
            if ($kls != NULL) {
                $sis    = Users::whereIn('id', Ambilkelas::select('users_id')->where('kelas_id', $kls->id))->orderBy('name')->get();
                return view('dash.dashboard', compact('kls', 'lgr', 'sis', 'jadwal'));
            }else{
                return view('dash.dashboard', compact('kls', 'lgr', 'jadwal'));
            }
        }elseif (Auth::user()->levels_id == 7) {
            $srt = Surattugas::where('users_id', Auth::user()->id)->paginate(5);
            return view('dash.dashboard', compact('srt', 'lgr'));
        }
    }

    public function create(){
        $set    = Settings::findorfail(1);
        $kls    = Ambilkelas::where('users_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->first();
        $plj    = Mapelkelas::where('kelas_id', $kls->kelas_id)->get();
        $senin  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '1')->get();
        $selasa = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '2')->get();
        $rabu   = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '3')->get();
        $kamis  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '4')->get();
        $jumat  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '5')->get();
        $sabtu  = Mapelkelas::where('kelas_id', $kls->kelas_id)->where('hari', '6')->get();
        return PDF::loadview('dash.cetakjadwal', compact('kls', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'))->setPaper('A4')->stream();
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id){
        Kelas::whereId($id)->update([
            'wali_id' => $request->wali
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        Users::findorfail($id)->delete();
        return redirect('akademik/status')->with('berhasil', 'User berhasil dihapus.');
    }
}
