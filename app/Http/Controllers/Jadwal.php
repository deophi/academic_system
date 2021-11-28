<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapels;
use App\Models\Kelas;
use App\Models\Mapelkelas;

class Jadwal extends Controller{
    public function store(Request $request){
        Mapelkelas::create([
            'kelas_id'  => $request->kid,
            'mapels_id' => $request->mpl,
            'hari'      => $request->hari,
            'awal'      => $request->awal,
            'akhir'     => $request->akhir
        ]);
        return redirect('akademik/siswa/kelasid='.$request->kid)->with('jberhasil', 'Jadwal berhasil ditambahkan.');
    }

    public function show($id){
        $kls = Kelas::select('jurusans_id')->where('id', $id)->get();
        foreach ($kls as $r) {
            $kat = $r->jurusans_id;
        }
        $mpl = Mapels::where('kat', '0')->orWhere('kat', $kat)->orderBy('nama')->get();
        return view('mpl.pilihmpl', compact('mpl', 'id'));
    }

    public function edit($id){
        $mpl  = Mapelkelas::findorfail($id);
        $guru = Mapels::where('nama', $mpl->mapels->nama)->get();
        
        return view('mpl.edit', compact('mpl', 'guru'));
    }

    public function update(Request $request, $id){
        Mapelkelas::whereId($id)->update([
            'mapels_id' => $request->mpl,
            'hari'      => $request->hari,
            'awal'      => $request->awal,
            'akhir'     => $request->akhir
        ]);
        return redirect('akademik/siswa/kelasid='.$request->kelas)->with('jberhasil', 'Jadwal berhasil diubah.');
    }

    public function destroy($id){
        Mapelkelas::findorfail($id)->delete();
        return redirect()->back()->with('jberhasil', 'Jadwal berhasil dihapus.');
    }

    public function stepnext(Request $request, $id){
        $mpl  = Mapels::where('id', $request->mpl)->get();
        foreach ($mpl as $r) {
            $nama = $r->nama;
        }
        $guru = Mapels::where('nama', $nama)->get();
        return view('mpl.lanjutmpl', compact('mpl', 'guru', 'id'));
    }
}
