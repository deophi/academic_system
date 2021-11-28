<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fouls;
use App\Models\Jenis;
use App\Models\Users;
use App\Models\Kelas;
use App\Models\Settings;
use App\Models\Ambilkelas;
use App\Models\Bulans;
use DB;
use PDF;
use Auth;

class Langgar extends Controller{
    public function index(){
        $set   = Settings::first();
        $fls   = Fouls::where('angkatans_id', $set->angkatans_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('plg.awal', compact('set', 'fls'));
    }

    public function jmlpoin(){
        $set    = Settings::first();
        $fls    = Fouls::where('angkatans_id', $set->angkatans_id)->orderBy('users_id', 'desc')->get();
        $jenis  = Jenis::orderBy('poin', 'desc')->get();
        $bln    = Bulans::all();
        $flsthn = Fouls::where('angkatans_id', $set->angkatans_id)->get();
        $flsbln = Fouls::where('angkatans_id', $set->angkatans_id)->whereMonth('created_at', $set->blnlgr_id)->get();
        return view('plg.jmlpoin', compact('set', 'fls', 'jenis', 'bln', 'flsthn', 'flsbln'));
    }

    public function jmlpoinsrc(Request $request){
        $set = Settings::select('angkatans_id')->first();
        $fls = Fouls::where('angkatans_id', $set->angkatans_id)->join('users', 'fouls.users_id', '=', 'users.id')->where('users.name','like',"%".$request->cari."%")->orderBy('users_id')->paginate(10);
        return view('plg.jmlpoin', compact('fls'));
    }

    public function create(){
        $lgr  = Jenis::orderBy('nama')->paginate(5);
        return view('plg.tjenis', compact('lgr'));
    }

    public function store(Request $request){
        Jenis::create([
            'nama' => $request->nama,
            'poin' => $request->poin
        ]);
        return redirect()->back()->with('berhasil', 'Jenis pelanggaran berhasil ditambahkan.');
    }

    public function newlgr(){
        $set = Settings::findorfail('1');

        $user = Users::where('levels_id', '8')->whereIn('id', Ambilkelas::select('users_id')->where('angkatans_id', $set->angkatans_id))->orderBy('name')->get();
        $jns  = Jenis::all();
        return view('plg.tplg', compact('jns', 'user'));
    }

    public function cetak($id){
        $set = Settings::findorfail('1');
        $fls = Fouls::findorfail($id);
        $u   = Ambilkelas::where('users_id', $fls->users_id)->where('angkatans_id', $set->angkatans_id)->get();
        return PDF::loadview('plg.cetakpdf', compact('u', 'fls'))->setPaper('B7', 'landscape')->stream();
    }

    public function storelgr(Request $request){
        $set = Settings::findorfail('1');

        Fouls::create([
            'users_id'     => $request->uid,
            'piket_id'     => Auth::user()->id,
            'jenis_id'     => $request->jid,
            'angkatans_id' => $set->angkatans_id,
            'jam'          => $request->jam,
            'mapel'        => $request->mapel,
            'keterangan'   => $request->ket
        ]);

        return redirect('akademik/pelanggaran')->with('berhasil', 'Pelanggaran Berhasil Dicatat.');
    }

    public function destroy($id){
        $del = Jenis::findorfail($id)->delete();
        return redirect()->back()->with('berhasil', 'Jenis pelanggaran berhasil dihapus.');
    }
}
