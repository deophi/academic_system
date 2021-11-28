<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pns;
use App\Models\Golongans;

class Pegawai extends Controller{
    public function index(){
        $a      = '0';
        $pgwno  = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->paginate(10);
        $pgwyes = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->paginate(10);
        $pn     = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->get();
        $py     = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->get();
        $hal    = Golongans::first();
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', '7')->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $ceno   = Users::where('levels_id', '7')->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $coyes  = Users::where('levels_id', '7')->where('jks', 1)->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->count();
        $ceyes  = Users::where('levels_id', '7')->where('jks', 2)->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->count();
        return view('list.pegawai', compact('a', 'pgwno', 'pgwyes', 'pn', 'py', 'hal', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function show($id){
        $a      = '0';
        $pgwno  = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->paginate(10);
        $pgwyes = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->paginate(10);
        $pn     = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->get();
        $py     = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->get();
        $hal    = Golongans::findorfail($id);
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', '7')->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $ceno   = Users::where('levels_id', '7')->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $coyes  = Users::where('levels_id', '7')->where('jks', 1)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->count();
        $ceyes  = Users::where('levels_id', '7')->where('jks', 2)->whereIn('id', Pns::select('users_id')->where('golongans_id', $id))->count();
        return view('list.pegawai', compact('a', 'pgwno', 'pgwyes', 'pn', 'py', 'hal', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function src(Request $request){
        $a      = '1';
        $pgwno  = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->where('name','like',"%".$request->cari."%")->orderBy('name')->paginate(10);
        $pgwyes = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->paginate(10);
        $pn     = Users::where('levels_id', '7')->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->get();
        $py     = Users::where('levels_id', '7')->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->get();
        $hal    = Golongans::findorfail(1);
        $gol    = Golongans::orderBy('nama')->get();
        $cono   = Users::where('levels_id', '7')->where('jks', 1)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $ceno   = Users::where('levels_id', '7')->where('jks', 2)->whereNotIn('id', Pns::select('users_id'))->orderBy('name')->count();
        $coyes  = Users::where('levels_id', '7')->where('jks', 1)->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->count();
        $ceyes  = Users::where('levels_id', '7')->where('jks', 2)->whereIn('id', Pns::select('users_id')->where('golongans_id', '1'))->count();
        return view('list.pegawai', compact('a', 'pgwno', 'pgwyes', 'pn', 'py', 'hal', 'gol', 'cono', 'ceno', 'coyes', 'ceyes'));
    }

    public function destroy($id){
        Pns::findorfail($id)->delete();
        return redirect()->back()->with('hapus', 'PNS berhasil dihapus.');
    }
}
