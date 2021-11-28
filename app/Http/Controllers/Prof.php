<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profils;
use File;

class Prof extends Controller{
    public function index(){
        $id   = 0;
        $prof = Profils::all();
        return view('pengaturan.profil', compact('id', 'prof'));
    }

    public function store(Request $request){
        if($request->hasFile('gbr')){
            $file = $request->file('gbr');
            $fn   = $file->getClientOriginalName();
            $name = pathinfo($fn, PATHINFO_FILENAME);
            $ext  = pathinfo($fn, PATHINFO_EXTENSION);

            $isi  = $request->isi;
            if ($isi == NULL) {
                $sub = NULL;
            }else{
                $sub = strip_tags($request->isi);
            }

            Profils::create([
                'judul' => $request->judul,
                'sub'   => $sub,
                'isi'   => $isi,
                'gbr'   => $name.' - '.$request->judul.'.'.$ext
            ]);
                $file->move('image/artikel/', $name.' - '.$request->judul.'.'.$ext);
        }else{
            Profils::create([
                'judul' => $request->judul,
                'sub'   => strip_tags($request->isi),
                'isi'   => $request->isi
            ]);
        }
        return redirect()->back()->with('tambah', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id){
        $prof = Profils::all();
        $edit = Profils::findorfail($id);
        return view('pengaturan.profil', compact('id', 'prof', 'edit'));
    }

    public function update(Request $request, $id){
        $isi = $request->isi;
        if ($isi == NULL) {
            $sub = NULL;
        }else{
            $sub = strip_tags($request->isi);
        }

        if($request->hasFile('gbr')){
            $sel  = Profils::where('id', $id)->first();
            File::delete('image/artikel/'.$sel->gbr);
            $file = $request->file('gbr');
            $fn   = $file->getClientOriginalName();
            $name = pathinfo($fn, PATHINFO_FILENAME);
            $ext  = pathinfo($fn, PATHINFO_EXTENSION);

            Profils::whereId($id)->update([
                'judul' => $request->judul,
                'sub'   => $sub,
                'isi'   => $isi,
                'gbr'   => $name.' - '.$request->judul.'.'.$ext
            ]);
                $file->move('image/artikel/', $name.' - '.$request->judul.'.'.$ext);
        }else{
            $sel  = Profils::where('id', $id)->first();
            File::delete('image/artikel/'.$sel->gbr);
            Profils::whereId($id)->update([
                'judul' => $request->judul,
                'sub'   => $sub,
                'isi'   => $isi
            ]);
        }
        return redirect()->route('profilsekolah.index')->with('ubah', 'Artikel berhasil diubah.');
    }

    public function destroy($id){
        $sel = Profils::where('id', $id)->first();
        File::delete('image/artikel/'.$sel->gbr);
        Profils::destroy($id);
        return redirect()->back()->with('hapus', 'Artikel berhasil dihapus.');
    }
}
