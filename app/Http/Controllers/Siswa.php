<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Ambilkelas;
use App\Models\Mapelkelas;
use App\Models\Users;
use Auth;
use PDF;

class Siswa extends Controller{
    public function index(){
        $kls = Kelas::whereIn('id', Ambilkelas::select('kelas_id')->where('users_id', Auth::user()->id))->orderBy('nama')->get();
        return view('siswa.index', compact('kls'));
    }

    public function show($id){
        $kls    = Kelas::findorfail($id);
        $sis    = Users::whereIn('id', Ambilkelas::select('users_id')->where('kelas_id', $id))->orderBy('name')->get();
        $plj    = Mapelkelas::where('kelas_id', $id)->orderBy('awal')->get();
        $senin  = Mapelkelas::where('kelas_id', $id)->where('hari', '1')->orderBy('awal')->get();
        $selasa = Mapelkelas::where('kelas_id', $id)->where('hari', '2')->orderBy('awal')->get();
        $rabu   = Mapelkelas::where('kelas_id', $id)->where('hari', '3')->orderBy('awal')->get();
        $kamis  = Mapelkelas::where('kelas_id', $id)->where('hari', '4')->orderBy('awal')->get();
        $jumat  = Mapelkelas::where('kelas_id', $id)->where('hari', '5')->orderBy('awal')->get();
        $sabtu  = Mapelkelas::where('kelas_id', $id)->where('hari', '6')->orderBy('awal')->get();
        return view('siswa.kelas', compact('kls', 'sis', 'plj', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'));
    }
}
