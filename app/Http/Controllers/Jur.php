<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusans;

class Jur extends Controller{
    public function store(Request $request){
        Jurusans::create([
            'nama' => $request->nama
        ]);
        return redirect()->back()->with('jberhasil', 'Jurusan Berhasil Ditambahkan.');
    }

    public function destroy($id){
        Jurusans::findorfail($id)->delete();
        return redirect('akademik/procaj')->with('jberhasil', 'Jurusan berhasil dihapus.');
    }
}
