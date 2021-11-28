<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suratds;
use App\Models\Surats;
use App\Models\Surattugas;

class Klasifikasi extends Controller{
    public function index(){
        $id = Suratds::findorfail('000');
        $kd = Suratds::orderBy('id')->paginate(10);
        $k  = Surats::orderBy('id')->where('suratds_id', $id->id)->paginate(10);
        return view('srt.kat', compact('id', 'kd', 'k'));
    }

    public function store(Request $request){
        if ($request->index == 1) {
            Suratds::create([
                'id'   => $request->id,
                'nama' => $request->nama
            ]);
            return redirect()->back()->with('dberhasil', 'Klasifikasi Dasar berhasil ditambahkan');
        }else{
            Surats::create([
                'id'         => $request->id,
                'suratds_id' => $request->sid,
                'nama'       => $request->nama
            ]);
            return redirect()->back()->with('kberhasil', 'Klasifikasi berhasil ditambahkan');
        }
    }

    public function show($id){
        $id = Suratds::findorfail($id);
        $kd = Suratds::orderBy('id')->paginate(10);
        $k  = Surats::orderBy('id')->where('suratds_id', $id->id)->paginate(10);
        return view('srt.kat', compact('kd', 'k', 'id'));
    }

    public function destroy($id){
        $id = str_pad($id, 3, '0', STR_PAD_LEFT);
        $cek = Suratds::where('id', $id)->count();
        
        if($cek > 0 ){
            Suratds::destroy($id);
            return redirect()->back()->with('dberhasil', 'Klasifikasi Dasar berhasil dihapus.');
        }else{
            Surats::destroy($id);
            return redirect()->back()->with('kberhasil', 'Klasifikasi berhasil dihapus.');
        }
    }
}
