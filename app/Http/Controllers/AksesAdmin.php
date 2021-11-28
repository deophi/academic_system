<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angkatans;
use App\Models\Jurusans;
use App\Models\Kelas;
use App\Models\Settings;
use App\Models\Users;
use App\Models\Mapels;

class AksesAdmin extends Controller{
    public function jurkel(){
        $akt  = Angkatans::orderBy('tahun', 'desc')->get();
        $jur  = Jurusans::paginate(10);
        $set  = Settings::select('angkatans_id')->get();
        
        foreach ($set as $r) {
            $hasil = $r->angkatans_id;
        }
        
        $kls  = Kelas::where('angkatans_id', $hasil)->paginate(10);
        $idk  = 0;
        $mpl  = Mapels::where('kat', '0')->paginate(10);
        $wali = Users::where('levels_id', '6')->whereNotIn('id', Kelas::select('wali_id')->where('angkatans_id', $hasil))->get();
        $def  = Settings::select('angkatans_id')->first();

        return view('jurkel.dash', compact('akt', 'jur', 'kls', 'mpl', 'set', 'idk', 'wali', 'def'));
    }

    public function angkatan(Request $request){
        Angkatans::create([
            'tahun' => $request->awal.' - '.$request->akhir
        ]);
        return redirect()->back()->with('aberhasil', 'Tahun Angkatan Berhasil Ditambahkan.');
    }
}
