<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Settings;
use App\Models\Ambilkelas;
use App\Models\Pns;
use App\Models\Pgs;
use App\Models\Siswas;
use Auth;
use File;

class Profil extends Controller{
    public function index(){
        $user = Users::where('id', Auth::user()->id)->get();
        $set  = Settings::select('angkatans_id')->first();
        $kls  = Ambilkelas::where('users_id', Auth::user()->id)->where('angkatans_id', $set->angkatans_id)->get();
        if (Auth::user()->levels_id == 8) {
            $sis = Siswas::where('users_id', Auth::user()->id)->first();
            return view('profil.tampil', compact('user', 'kls', 'sis'));
        }else{
            $pns = Pns::where('users_id', Auth::user()->id)->first();
            $pgs = Pgs::where('users_id', Auth::user()->id)->first();
            return view('profil.tampil', compact('user', 'kls', 'pns', 'pgs'));
        }
    }

    public function update(Request $request, $id){
        if (Auth::user()->levels_id < 8) {
            Users::whereId($id)->update([
                'email'  => $request->email,
                'jks'    => $request->jks,
                'alamat' => $request->alamat,
                'hp'     => $request->hp,
                'tempat' => $request->tempat,
                'lahir'  => $request->lahir
            ]);

            $pgs = Pgs::where('users_id', $id)->first();
            
            Pgs::whereId($pgs->id)->update([
                'gd' => $request->gd,
                'gb' => $request->gb
            ]);
        }else{
            Users::whereId($id)->update([
                'email'  => $request->email,
                'jks'    => $request->jks,
                'alamat' => $request->alamat,
                'hp'     => $request->hp,
                'tempat' => $request->tempat,
                'lahir'  => $request->lahir
            ]);

            $cek = Siswas::where('users_id', Auth::user()->id)->first();

            Siswas::whereId($cek->id)->update([
                'nis'  => $request->nis,
                'nisn' => $request->nisn
            ]);
        }
        
        return redirect()->back()->with('pesan', 'Profil anda berhasil diubah.');
    }

    public function motto(){
        return view('profil.motto');
    }

    public function mottoup(Request $request){
        Users::whereId(Auth::user()->id)->update(['bio' => $request->motto]);
        return redirect('akademik/profil')->with('motto', 'Motto berhasil diubah.');
    }

    public function gbr(){
        return view('profil.gbr');
    }

    public function upgbr(Request $request){
        if($request->hasFile('gambar')){
            if (Auth::user()->gambar != 'default1.png') {
                if (Auth::user()->gambar != 'default2.png') {
                    File::delete('image/profil/'.Auth::user()->gambar);
                }
            }elseif (Auth::user()->gambar != 'default2.png') {
                if (Auth::user()->gambar != 'default1.png') {
                    File::delete('image/profil/'.Auth::user()->gambar);
                }
            }
            $file = $request->file('gambar');
            $n    = Auth::user()->id.'_'.Auth::user()->name;
            // $gbr->getClientOriginalName()
            Users::whereId(Auth::user()->id)->update(['gambar' => $n.'_'.$file->getClientOriginalName()]);
            $file->move('image/profil/', $n.'_'.$file->getClientOriginalName());
            return redirect('akademik/profil')->with('motto', 'Gambar berhasil diubah.');
        }else{
            return redirect('akademik/profil')->with('gbr', 'Gambar tidak diubah.');
        }
    }

    public function pass(){
        return view('profil.pass');
    }

    public function upw(Request $request){
        if(!(Hash::check($request->get('lama'), Auth::user()->password))){
            return redirect()->back()->with('pesan', 'Password saat ini tidak sesuai.');
        }elseif(strcmp($request->get('lama'), $request->get('baru')) == 0) {
            return redirect()->back()->with('pesan', 'Password lama dan baru sama.');
        }elseif(!(strcmp($request->get('baru'), $request->get('konfirm'))) == 0) {
            return redirect()->back()->with('pesan', 'Password baru dan konfirmasi password harus sama.');
        }else{
            Users::whereId(Auth::user()->id)->update(['password' => Hash::make($request->baru)]);
            return redirect('akademik/profil')->with('pesan', 'Password anda berhasil diubah.');
        }
    }
}
