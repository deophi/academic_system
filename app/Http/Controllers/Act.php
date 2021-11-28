<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatans;
use App\Models\Imgacts;
use App\Models\Users;
use File;

class Act extends Controller{
    public function index(){
        $index = 0;
        $act   = Kegiatans::paginate(5);
        $pb    = Users::orderBy('name')->where('levels_id', '5')->whereNotIn('id', Kegiatans::select('users_id'))->orWhere('levels_id', '6')->whereNotIn('id', Kegiatans::select('users_id'))->get();
        return view('pengaturan.act', compact('index', 'act', 'pb'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        $id = $request->id;
        if ($id == 1) {
            Kegiatans::create([
                'nama'     => $request->nama,
                'users_id' => $request->pembina,
                'isi'      => $request->desk,
                'sub'      => strip_tags($request->desk)
            ]);
            return redirect()->back()->with('tambah', 'Kegiatan Siswa berhasil ditambah.');
        }elseif ($id == 2) {
            if($request->hasFile('gbr')){
                $file = $request->file('gbr');
                $fn   = $file->getClientOriginalName();
                $name = pathinfo($fn, PATHINFO_FILENAME);
                $ext  = pathinfo($fn, PATHINFO_EXTENSION);

                Imgacts::create([
                    'kegiatans_id' => $request->actid,
                    'img'   => $name.' - '.$request->actid.'.'.$ext
                ]);
                $file->move('image/kegiatan/', $name.' - '.$request->actid.'.'.$ext);
                return redirect()->back()->with('tambah', 'Gambar kegiatan berhasil ditambah.');
            }else{
                return redirect()->back();
            }
        }
    }

    public function show($id){
        $index = 1;
        $act   = Kegiatans::findorfail($id);
        $pb    = Users::orderBy('name')->where('levels_id', '5')->whereNotIn('id', Kegiatans::select('users_id'))->orWhere('levels_id', '6')->whereNotIn('id', Kegiatans::select('users_id'))->get();
        $img   = Imgacts::where('kegiatans_id', $id)->get();
        return view('pengaturan.actedit', compact('index', 'act', 'pb', 'img'));
    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        Kegiatans::whereId($id)->update([
            'nama'     => $request->nama,
            'users_id' => $request->pembina,
            'isi'      => $request->desk,
            'sub'      => strip_tags($request->desk)
        ]);
        return redirect()->back()->with('ubah', 'Deskripsi Kegiatan berhasil diubah.');
    }

    public function destroy(Request $request, $id){
        $i = $request->i;
        if ($i == 1) {
            $img = Imgacts::where('kegiatans_id', $id)->get();
            foreach ($img as $r) {
                File::delete('image/kegiatan/'.$r->img);
                Imgacts::destroy($r->id);
            }
            Kegiatans::destroy($id);
            return redirect()->back()->with('hapus', 'Kegiatan Siswa berhasil dihapus.');
        }elseif ($i == 2) {
            $sel = Imgacts::where('id', $id)->first();
            File::delete('image/kegiatan/'.$sel->img);
            Imgacts::destroy($id);
            return redirect()->back()->with('hapus', 'Kegiatan Siswa berhasil dihapus.');
        }elseif ($i == 3) {
            Users::destroy($id);
            return redirect()->back()->with('hapus', 'Berhasil dihapus.');
        }
    }
}
