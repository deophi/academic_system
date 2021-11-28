<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Levels;
use App\Models\Pgs;
use App\Models\Pos;
use App\Models\Siswas;
use Illuminate\Support\Facades\DB;

class ChangeLevel extends Controller{
    public function index(){
        $user = Users::where('id', '!=', '12345678')->orderBy('levels_id')->orderBy('created_at', 'desc')->paginate(20);
        return view('lvl.jab', compact('user'));
    }

    public function create(){
        $lvl = Levels::paginate(10);
        $no  = "0";
        return view('lvl.tambah', compact('lvl', 'no'));
    }

    public function store(Request $request){
        Levels::create(['nama' => $request->nama]);

        return redirect()->back()->with('berhasil', 'Jabatan berhasil ditambahkan.');
    }

    public function show($id){
        
    }

    public function edit($id){
        $user = Users::findorfail($id);
        $lvl  = Levels::all();
        $pgs  = Pgs::where('users_id', $id)->first();
        $pos  = Pos::orderBy('nama')->get();
        $stat = Siswas::where('users_id', $id)->first();

        if ($pgs == NULL) {
            $index = 2;
        }elseif ($pgs->pos_id == NULL){
            $index = 2;
        }else{
            $index = 1;
        }

        if ($stat != NULL) {
            $istat = 1;
        }else{
            $istat = 2;
        }

        return view('auth.ubahlvl', compact('user', 'lvl', 'pgs', 'pos', 'index', 'istat'));
    }

    public function update(Request $request, $id){
        if ($request->level < 4) {
            Users::whereId($id)->update(['levels_id' => $request->level]);
        }elseif ($request->level < 8) {
            if ($request->jabsel < 1) {
                if ($request->jabin == NULL) {
                    return redirect()->back()->with('pesan', 'Silahkan isi kolom "Jabatan Baru" jika memilih "Lainnya" pada kolom "Jabatan Kepegawaian".');
                }else{
                    Users::whereId($id)->update(['levels_id' => $request->level]);
                    Pos::create(['nama' => $request->jabin]);
                    $pos = Pos::where('nama', $request->jabin)->first();
                    $pgs = Pgs::where('users_id', $id)->first();
                    
                    if ($pgs == NULL) {
                        Pgs::create([
                            'users_id' => $id,
                            'pos_id'   => $pos->id
                        ]);
                    }else{
                        Pgs::whereId($pgs->id)->update(['pos_id' => $pos->id]);
                    }
                }
            }else{
                Users::whereId($id)->update(['levels_id' => $request->level]);
                $pgs = Pgs::where('users_id', $id)->first();

                if ($pgs == NULL) {
                    Pgs::create([
                        'users_id' => $id,
                        'pos_id'   => $request->jabsel
                    ]);
                }else{
                    Pgs::whereId($pgs->id)->update(['pos_id' => $request->jabsel]);
                }
            }
        }else{
            Users::whereId($id)->update(['levels_id' => $request->level]);
        }
        return redirect('akademik/status')->with('berhasil', 'Status berhasil diubah.');
    }

    public function destroy($id){
        Levels::findorfail($id)->delete();
        return redirect()->back()->with('hapus', 'Jabatan berhasil dihapus');
    }

    public function src(Request $request){
        $user = Users::where('name','like',"%".$request->cari."%")->paginate(10);

        return view('lvl.jab', compact('user'));
    }
}
