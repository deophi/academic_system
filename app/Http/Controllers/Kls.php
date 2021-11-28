<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Angkatans;
use App\Models\Jurusans;
use App\Models\Mapels;
use App\Models\Users;
use App\Models\Settings;

class Kls extends Controller{
    public function store(Request $request){
        Kelas::create([
            'nama'         => $request->nama,
            'wali_id'      => $request->wali,
            'jurusans_id'  => $request->jur,
            'angkatans_id' => $request->akt,
            'tingkat'      => $request->tingkat
            ]);
        return redirect()->back()->with('kberhasil', 'Kelas Berhasil Ditambahkan.');
    }

    public function show($id){
        $akt  = Angkatans::orderBy('tahun', 'desc')->get();
        $jur  = Jurusans::paginate(10);
        $set  = Angkatans::select('tahun')->where('id', $id)->get();
        $kls  = Kelas::where('angkatans_id', $id)->paginate(10);
        $idk  = 1;
        $mpl  = Mapels::where('kat', '0')->paginate(10);
        $wali = Users::where('levels_id', '6')->whereNotIn('id', Kelas::select('wali_id')->where('angkatans_id', $id))->get();
        $def  = Settings::select('angkatans_id')->first();

        return view('jurkel.dash', compact('akt', 'jur', 'kls', 'set', 'mpl', 'idk', 'wali', 'def'));
    }

    public function edit($id){
        $set = Settings::select('angkatans_id')->get();
        foreach ($set as $r) {
            $hasil = $r->angkatans_id;
        }
        $kls = Kelas::where('angkatans_id', $hasil)->paginate(10);
        $kid = Kelas::findorfail($id);
        $jur = Jurusans::all();
        $akt = Angkatans::orderBy('tahun', 'desc')->get();
        $idk = 0;
        $wali = Users::where('levels_id', '6')->whereNotIn('id', Kelas::select('wali_id')->where('angkatans_id', $hasil))->get();

        return view('jurkel.editkls', compact('kls', 'jur', 'akt', 'set', 'idk', 'kid', 'wali'));
    }

    public function update(Request $request, $id){
        $wali = Users::where('levels_id', '6')->orWhere('levels_id', '5')->where('id', '=', $request->wali)->first();
        if($wali == NULL){
            return redirect()->back()->with('kgagal', 'Silahkan periksa kembali NIP Wali Kelas.');
        }else{
            Kelas::whereId($id)->update([
                'nama'         => $request->nama,
                'wali_id'      => $request->wali,
                'jurusans_id'  => $request->jur,
                'angkatans_id' => $request->akt
            ]);
            return redirect('akademik/procaj')->with('kberhasil', 'Kelas Berhasil Diubah.');
        }
    }

    public function destroy($id){
        Kelas::findorfail($id)->delete();
        return redirect('akademik/procaj')->with('kberhasil', 'Kelas berhasil dihapus.');
    }
}
