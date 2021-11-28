<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Kelas;
use App\Models\Jurusans;
use App\Models\Settings;
use App\Models\Angkatans;
use App\Models\Ambilkelas;
use App\Models\Mapelkelas;
use App\Models\Siswas;
use PDF;

class DaftarUser extends Controller{
    public function ksiswa(){
        $set   = Settings::findorfail(1);
        $kls   = Kelas::where('angkatans_id', $set->angkatans_id)->get();
        $siswa = Users::whereIn('id', Siswas::select('users_id')->where('jurusans_id', '>', '0'))->whereNotIn('id', Ambilkelas::select('users_id')->where('angkatans_id', $set->angkatans_id))->paginate(20);
        
        return view('list.kelas', compact('kls', 'siswa'));
    }

    public function kelas($id){
        $set    = Settings::select('angkatans_id')->get();
        foreach ($set as $r) {
            $hasil = $r->angkatans_id;
        }
        $kls    = Kelas::where('angkatans_id', $hasil)->get();
        $idkls  = Kelas::findorfail($id);
        $kelas  = Ambilkelas::where('kelas_id', $id)->join('users', 'ambilkelas.users_id', '=', 'users.id')->where('users.levels_id', '8')->orderBy('users.name')->get();
        $plj    = Mapelkelas::where('kelas_id', $id)->orderBy('awal')->get();
        $wali   = Users::where('levels_id', '6')->whereNotIn('id', Kelas::select('wali_id')->where('angkatans_id', $hasil))->get();

        $senin  = Mapelkelas::where('kelas_id', $id)->where('hari', '1')->orderBy('awal')->get();
        $selasa = Mapelkelas::where('kelas_id', $id)->where('hari', '2')->orderBy('awal')->get();
        $rabu   = Mapelkelas::where('kelas_id', $id)->where('hari', '3')->orderBy('awal')->get();
        $kamis  = Mapelkelas::where('kelas_id', $id)->where('hari', '4')->orderBy('awal')->get();
        $jumat  = Mapelkelas::where('kelas_id', $id)->where('hari', '5')->orderBy('awal')->get();
        $sabtu  = Mapelkelas::where('kelas_id', $id)->where('hari', '6')->orderBy('awal')->get();

        $co     = Ambilkelas::where('kelas_id', $id)->whereIn('users_id', Users::select('id')->where('jks', 1))->count();
        $ce     = Ambilkelas::where('kelas_id', $id)->whereIn('users_id', Users::select('id')->where('jks', 2))->count();

        return view('list.kelassiswa', compact('kelas' , 'kls', 'idkls', 'plj', 'wali', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'co', 'ce'));
    }

    public function tkelas($id){
        $user = Users::findORfail($id);
        $set  = Settings::findorfail(1);
        $kls  = Kelas::where('jurusans_id', $user->siswa->jurusans_id)->where('angkatans_id', $set->angkatans_id)->get();

        return view('list.kelastambah', compact('user', 'kls'));
    }

    public function storekelas(Request $request){
        $akt = Settings::select('angkatans_id')->get();
        foreach ($akt as $r) {
            $hasil = $r->angkatans_id;
        }
        Ambilkelas::create([
            'kelas_id'     => $request->kelas,
            'users_id'     => $request->id,
            'angkatans_id' => $hasil
        ]);

        return redirect('akademik/siswa/kelas')->with('berhasil', 'Siswa berhasil ditambahkan ke kelas.');
    }

    public function ukelas($id){
        $user = Users::findORfail($id);
        $set  = Settings::findorfail(1);
        $kls  = Kelas::where('jurusans_id', $user->siswa->jurusans_id)->where('angkatans_id', $set->angkatans_id)->get();

        return view('list.kelasubah', compact('user', 'kls'));
    }

    public function updatekelas(Request $request, $id){
        Ambilkelas::whereId($id)->update(['kelas_id' => $request->kelas]);
        return redirect('akademik/siswa/kelas')->with('berhasil', 'Kelas berhasil diubah.');
    }

    public function jsiswa(){
        $jur   = Jurusans::all();
        $siswa = Users::where('levels_id', '8')->whereIn('id', Siswas::select('users_id')->where('jurusans_id', '0'))->paginate(20);

        return view('list.jurusan', compact('jur', 'siswa'));
    }

    public function jurusan($id){
        $jur     = Jurusans::all();
        $idjur   = Jurusans::findorfail($id);
        $jurusan = Users::where('levels_id', '8')->whereIn('id', Siswas::select('users_id')->where('jurusans_id', $id))->paginate(20);
        $co      = Users::where('levels_id', '8')->where('jks', 1)->whereIn('id', Siswas::select('users_id')->where('jurusans_id', $id))->count();
        $ce      = Users::where('levels_id', '8')->where('jks', 2)->whereIn('id', Siswas::select('users_id')->where('jurusans_id', $id))->count();

        return view('list.jurusansiswa', compact('jur', 'idjur', 'jurusan', 'co', 'ce'));
    }

    public function tjurusan($id){
        $user  = Users::findORfail($id);
        $jur   = Jurusans::all();
        $idjur = Siswas::select('id')->where('users_id', $id)->first();

        return view('list.jurusantambah', compact('user', 'jur', 'idjur'));
    }

    public function storejurusan(Request $request, $id){
        $idj = 
        Siswas::whereId($id)->update(['jurusans_id' => $request->jur]);
        return redirect('akademik/siswa/jurusan')->with('berhasil', 'Jurusan berhasil diubah.');
    }

    public function cetaksis($id){
        $kls   = Kelas::findorfail($id);
        $siswa = Ambilkelas::where('kelas_id', $id)->join('users', 'ambilkelas.users_id', '=', 'users.id')->where('users.levels_id', '8')->orderBy('users.name')->get();
        $co    = Ambilkelas::where('kelas_id', $id)->whereIn('users_id', Users::select('id')->where('jks', 1))->count();
        $ce    = Ambilkelas::where('kelas_id', $id)->whereIn('users_id', Users::select('id')->where('jks', 2))->count();
        
        return PDF::loadview('list.cetakdaftarsiswa', compact('kls', 'siswa', 'co', 'ce'))->setPaper('A4')->stream();
    }

    public function cetakjdwl($id){
        $kls    = Kelas::findorfail($id);
        $senin  = Mapelkelas::where('kelas_id', $id)->where('hari', '1')->orderBy('awal')->get();
        $selasa = Mapelkelas::where('kelas_id', $id)->where('hari', '2')->orderBy('awal')->get();
        $rabu   = Mapelkelas::where('kelas_id', $id)->where('hari', '3')->orderBy('awal')->get();
        $kamis  = Mapelkelas::where('kelas_id', $id)->where('hari', '4')->orderBy('awal')->get();
        $jumat  = Mapelkelas::where('kelas_id', $id)->where('hari', '5')->orderBy('awal')->get();
        $sabtu  = Mapelkelas::where('kelas_id', $id)->where('hari', '6')->orderBy('awal')->get();

        return PDF::loadview('list.cetakjadwal', compact('kls', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'))->setPaper('A4')->stream();
    }
}
