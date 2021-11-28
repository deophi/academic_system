<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Levels;
use App\Models\Angkatans;
use App\Models\Jurusans;
use App\Models\Settings;
use App\Models\Kelas;
use App\Models\Mapels;

class Mapel extends Controller{
    public function store(Request $request){
        $guru = Users::select('id')->where('levels_id', '6')->where('id', $request->uid)->orWhere('levels_id', '5')->where('id', $request->uid)->first();
        if($guru == NULL){
            return redirect()->back()->with('gagal', 'NIP Guru tidak ditemukan. Masukkan NIP dengan benar.');
        }else{
            Mapels::create([
                'nama'     => $request->nama,
                'kat'      => $request->kat,
                'users_id' => $request->uid
            ]);
            return redirect()->back()->with('mberhasil', 'Guru Mata Pelajaran berhasil ditambahkan.');
        }
    }

    public function show($id){
        $akt = Angkatans::orderBy('tahun', 'desc')->paginate(10);
        $jur = Jurusans::paginate(10);
        $set = Settings::select('angkatans_id')->get();
        foreach ($set as $r) {
            $hasil = $r->angkatans_id;
        }
        $kls = Kelas::where('angkatans_id', $hasil)->paginate(10);
        $idk = 0;
        $mpl = Mapels::where('kat', $id)->paginate(10);

        return view('jurkel.dash', compact('akt', 'jur', 'kls', 'mpl', 'set', 'idk'));
    }

    public function ubah(Request $request){
        $guru = Users::select('id')->where('id', $request->uid)->first();
        if ($guru == NULL) {
            return redirect()->back()->with('mgagal', 'NIP Guru tidak ditemukan. Masukkan NIP dengan benar.');
        }else{
            $id = Mapels::where('users_id', $request->uid)->get();
            foreach ($id as $r) {
                $id = $r->id;
            }
            Mapels::whereId($id)->update([
                'nama'    => $request->mpl,
                'kat'      => $request->kat,
                'users_id' => $request->uid
            ]);
            return redirect()->back()->with('mberhasil', 'Pelajaran berhasil diubah.');
        }
    }

    public function destroy($id){
        Mapels::findorfail($id)->delete();
        return redirect()->back()->with('mberhasil', 'Guru Mata Pelajaran berhasil dihapus.');
    }
}
