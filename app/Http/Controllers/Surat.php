<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surattugas;
use App\Models\Surats;
use App\Models\Suratds;
use App\Models\Users;
use App\Models\Pns;
use App\Models\Pgs;
use App\Models\Settings;
use App\Models\Bulans;
use Carbon\Carbon;
use PDF;
use Auth;

class Surat extends Controller{
    public function index(){
        if (Auth::user()->levels_id < 5) {
            $thn    = Carbon::now()->format('Y');
            $srt    = Surattugas::whereYear('waktu', $thn)->orderBy('idkeluar', 'desc')->paginate(20);
            $set    = Settings::first();
            $bln    = Bulans::all();
            $dalam  = Surattugas::whereYear('waktu', $thn)->where('jenis', 1)->count();
            $luar   = Surattugas::whereYear('waktu', $thn)->where('jenis', 2)->count();
            $srtbln = Surattugas::whereYear('waktu', $thn)->whereMonth('created_at', $set->blnlgr_id)->get();
            return view('srt.index', compact('srt', 'set', 'bln', 'dalam', 'luar', 'srtbln', 'thn'));
        }else{
            $srt = Surattugas::where('users_id', Auth::user()->id)->orderBy('waktu', 'desc')->orderBy('idkeluar', 'desc')->paginate(20);
            return view('srt.index', compact('srt'));
        }
    }

    public function create(Request $request){
        $id  = $request->kd;
        if ($id == NULL) {
            $srt = Suratds::orderBy('id')->get();
            return view('srt.buat', compact('srt'));
        }else{
            $kd  = Suratds::findorfail($id);
            $srt = Surats::where('suratds_id', $id)->get();
            $usr = Users::where('levels_id', '5')->orWhere('levels_id', '6')->orWhere('levels_id', '7')->orderBy('name')->get();
            return view('srt.nextstep', compact('srt', 'id', 'kd', 'usr'));
        }
    }

    public function store(Request $request){
        $thn = Carbon::parse($request->tgl)->format('Y');
        $srt = Surattugas::whereYear('waktu', $thn)->get();
        
        $kode = '001';
        if ($srt != NULL) {
            foreach ($srt as $r) {
                $kode = $r->idkeluar + 1;
                $kode = str_pad($kode, 3, '0', STR_PAD_LEFT);
            }
        }

        Surattugas::create([
            'idkeluar'  => $kode,
            'tujuan'    => $request->tujuan,
            'surats_id' => $request->kid,
            'users_id'  => $request->uid,
            'jenis'     => $request->jenis,
            'tempat'    => $request->tempat,
            'waktu'     => $request->tgl,
            'waktuend'  => $request->akhir
        ]);

        return redirect('akademik/surattugas')->with('berhasil', 'Surat Tugas Berhasil Dibuat.');
    }

    public function show($id){
        $srt = Surattugas::findorfail($id);
        $b = Carbon::parse($srt->waktu)->translatedFormat('m');

        if ($b == 1) {
            $b = 'I';
        }elseif ($b == 2) {
            $b = 'II';
        }elseif ($b == 3) {
            $b = 'III';
        }elseif ($b == 4) {
            $b = 'IV';
        }elseif ($b == 5) {
            $b = 'V';
        }elseif ($b == 6) {
            $b = 'VI';
        }elseif ($b == 7) {
            $b = 'VII';
        }elseif ($b == 8) {
            $b = 'VIII';
        }elseif ($b == 9) {
            $b = 'IX';
        }elseif ($b == 10) {
            $b = 'X';
        }elseif ($b == 11) {
            $b = 'XI';
        }else{
            $b = 'XII';
        }

        $pns = Pns::where('users_id', $srt->users_id)->first();
        if ($pns == NULL) {
            $nip = '-';
            $gol = '-';
        }else{
            $nip = $pns->id;
            $gol = $pns->golongans->nama;
        }
        $kep = Pns::whereIn('users_id', Users::select('id')->where('levels_id', '4'))->first();
        $jab = Pgs::where('users_id', $srt->users_id)->first();
        $bio = Settings::findorfail(1);
        $pgs = Pgs::whereIn('users_id', Users::select('id')->where('levels_id', '4'))->first();
        $gu  = Pgs::where('users_id', $srt->users_id)->first();

        return PDF::loadview('srt.cetak', compact('srt', 'b', 'nip', 'gol', 'kep', 'jab', 'bio', 'pgs', 'gu'))->setPaper('A4')->stream();
    }

    public function edit(Request $request, $id){
        $srt = Surattugas::findorfail($id);
        $id  = $request->kd;
        if ($id == NULL) {
            $kd = Suratds::all();
            return view('srt.edit', compact('srt', 'kd'));
        }else{
            $kd  = Suratds::findorfail($id);
            $k   = Surats::where('suratds_id', $id)->get();
            $usr = Users::orderBy('name')->where('levels_id', '5')->orWhere('levels_id', '6')->orWhere('levels_id', '7')->get();
            return view('srt.nextedit', compact('srt', 'kd', 'k', 'usr'));
        }
    }

    public function update(Request $request, $id){
        Surattugas::whereId($id)->update([
            'tujuan'    => $request->tujuan,
            'surats_id' => $request->kid,
            'users_id'  => $request->uid,
            'tempat'    => $request->tempat,
            'waktu'     => $request->tgl
        ]);

        return redirect('akademik/surattugas')->with('berhasil', 'Surat Tugas Berhasil Diubah.');
    }

    public function destroy($id){
        Surattugas::destroy($id);
        return redirect()->back()->with('alert', 'Surat Tugas Berhasil Dihapus.');
    }
}
