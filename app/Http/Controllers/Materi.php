<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materis;
use Auth;

class Materi extends Controller{
    public function index(){
        if (Auth::user()->levels_id < 5 OR Auth::user()->levels_id == 8) {
            $mtr = Materis::orderBy('id', 'desc')->paginate(20);
        }else {
            $mtr = Materis::where('users_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);
        }
        return view('materi.index', compact('mtr'));
    }

    public function create(){
        return view('materi.upload');
    }

    public function store(Request $request){
        if($request->hasFile('materi')){
            $file = $request->file('materi');
            $fn   = $file->getClientOriginalName();
            $ext  = pathinfo($fn, PATHINFO_EXTENSION);

            Materis::create([
                'nama'     => $request->judul,
                'users_id' => Auth::user()->id,
                'file'     => $request->judul.' - '.Auth::user()->name.'.'.$ext
            ]);
            $file->move('file/materi/', $request->judul.' - '.Auth::user()->name.'.'.$ext);
            return redirect('akademik/materi')->with('berhasil', 'Materi berhasil di upload.');
        }else{
            return redirect('akademik/materi')->with('gagal', 'Materi tidak di upload.');
        }
    }

    public function show($id){
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
