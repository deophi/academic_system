<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Pgs;
use App\Models\Siswas;

class Author extends Controller{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return redirect('login');
    }

    public function create(){
        
    }

    public function store(Request $request){
        $mail = Users::where('email', $request->email)->first();

        if ($mail != NULL) {
            return redirect()->back()->with('pesan', 'Email yang anda masukkan sudah terdaftar.');
        }elseif (!(strcmp($request->get('pass'), $request->get('konfirm'))) == 0) {
            return redirect()->back()->with('pesan', 'Password dan konfirmasi password harus sama.');
        }else{
            $jk  = $request->jks;
            $img = 'default';
            if($jk == 1){
                $gbr = $img.'1.png';
            }else{
                $gbr = $img.'2.png';
            }

            if ($request->nis == 0) {
                Users::create([
                    'email'       => $request->email,
                    'password'    => hash::make($request->pass),
                    'name'        => $request->nama,
                    'tempat'      => $request->tempat,
                    'lahir'       => $request->lahir,
                    'levels_id'   => '2',
                    'jks'         => $request->jks,
                    'alamat'      => $request->alamat,
                    'hp'          => $request->hp,
                    'gambar'      => $gbr
                ]);

                $usr = Users::select('id')->where('email', $request->email)->first();

                if ($request->gd != NULL) {
                    Pgs::create([
                        'users_id' => $usr->id,
                        'gd'       => $request->gd,
                        'gb'       => $request->gb
                    ]);
                }elseif ($request->gb != NULL) {
                    Pgs::create([
                        'users_id' => $usr->id,
                        'gd'       => $request->gd,
                        'gb'       => $request->gb
                    ]);
                }

                return redirect('login')->with('berhasil', 'Akun anda berhasil dibuat.');
            }else{
                $nis  = Siswas::where('nis', $request->nis)->first();
                $nisn = Siswas::where('nisn', $request->nisn)->first();

                if ($nis != NULL) {
                    return redirect()->back()->with('pesan', 'NIS yang anda masukkan sudah terdaftar.');
                }elseif ($nisn != NULL) {
                    return redirect()->back()->with('pesan', 'NISN yang anda masukkan sudah terdaftar.');
                }else{
                    Users::create([
                        'email'     => $request->email,
                        'password'  => hash::make($request->pass),
                        'name'      => $request->nama,
                        'tempat'    => $request->tempat,
                        'lahir'     => $request->lahir,
                        'levels_id' => '2',
                        'jks'       => $request->jks,
                        'alamat'    => $request->alamat,
                        'hp'        => $request->hp,
                        'gambar'    => $gbr
                    ]);

                    $uid = Users::select('id')->where('email', $request->email)->first();

                    Siswas::create([
                        'users_id'    => $uid->id,
                        'nis'         => $request->nis,
                        'nisn'        => $request->nisn,
                        'jurusans_id' => '0'
                    ]);

                    return redirect('login')->with('berhasil', 'Akun anda berhasil dibuat.');   
                }
            }
        }
    }

    public function show($id){
        return view('auth.register', compact('id'));
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        $user = Users::where('email', $id)->get();
        foreach ($user as $r) {
            $u = $r->id;
        }

        if(!(strcmp($request->get('pass'), $request->get('konfirm'))) == 0) {
            return redirect()->back()->with('pesan', 'Password baru dan konfirmasi password harus sama.');
        }else{
            Users::whereId($u)->update(['password' => Hash::make($request->pass)]);
            return redirect('login')->with('berhasil', 'Password anda berhasil diubah.');
        }
    }

    public function destroy($id){
        
    }
}
