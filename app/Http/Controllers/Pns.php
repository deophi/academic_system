<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongans;

class Pns extends Controller{
    public function index(){
        $gol = Golongans::orderBy('nama')->paginate(10);
        return view('gol.index', compact('gol'));
    }

    public function store(Request $request){
        Golongans::create([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('berhasil', 'Golongan / Pangkat berhasil ditambahkan.');
    }

    public function destroy($id){
        Golongans::destroy($id);
        return redirect()->back()->with('berhasil', 'Golongan / Pangkat berhasil dihapus.');
    }
}
