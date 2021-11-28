<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Tentangs;
use App\Models\Socs;
use App\Models\Bulans;
use Carbon\Carbon;
use File;

class Pengaturan extends Controller{
    public function index(){
    	$set = Settings::first();
        $abt = Tentangs::findorfail(1);
        $sm  = Socs::findorfail(1);
    	return view('pengaturan.set', compact('set', 'abt', 'sm'));
    }

    public function update(Request $request, $id){
    	if ($id == 1) {
            Settings::whereId(1)->update(['angkatans_id' => $request->akt]);
            return redirect()->back()->with('aberhasil', 'Angkatan aktif berhasil diubah.');
        }elseif ($id == 2) {
            Settings::whereId(1)->update([
                'alamat' => $request->alamat,
                'telp'   => $request->telp,
                'fax'    => $request->fax,
                'web'    => $request->web,
                'mail'   => $request->mail
            ]);
            Tentangs::whereId(1)->update([
                'slog'    => $request->slog,
                'ytembed' => $request->yt
            ]);
            return redirect()->back()->with('bio', 'Biodata Sekolah berhasil diubah.');
        }elseif ($id == 3) {
            if($request->hasFile('logo')){
                $gbr  = Settings::where('id', 1)->first();
                File::delete('image/set/'.$gbr->logo);
                $file = $request->file('logo');
                Settings::whereId(1)->update(['logo' => $file->getClientOriginalName()]);
                $file->move('image/set/', $file->getClientOriginalName());
                return redirect()->back()->with('logo', 'Logo sekolah berhasil diubah.');
            }else{
                return redirect()->back()->with('logo', 'Logo sekolah tidak diubah.');
            }
        }elseif ($id == 4) {
            if($request->hasFile('kop')){
                $gbr = Settings::where('id', 1)->first();
                File::delete('image/set/'.$gbr->kop);
                $file = $request->file('kop');
                Settings::whereId(1)->update(['kop' => $file->getClientOriginalName()]);
                $file->move('image/set/', $file->getClientOriginalName());
                return redirect()->back()->with('logo', 'Logo KOP surat berhasil diubah.');
            }else{
                return redirect()->back()->with('logo', 'Logo KOP surat tidak diubah.');
            }
        }elseif ($id == 5) {
            Tentangs::whereId(1)->update(['sambutan' => $request->sambut]);
            return redirect()->back()->with('sambut', 'Kalimat Sambutan berhasil diubah.');
        }elseif ($id == 6) {
            if($request->hasFile('ttd')){
                $gbr  = Settings::where('id', 1)->first();
                File::delete('image/set/'.$gbr->ttd);
                $file = $request->file('ttd');
                Settings::whereId(1)->update(['ttd' => $file->getClientOriginalName()]);
                $file->move('image/set/', $file->getClientOriginalName());
                return redirect()->back()->with('logo', 'Tanda tangan Kepala Sekolah berhasil diubah.');
            }else{
                return redirect()->back()->with('logo', 'Tanda tangan Kepala Sekolah tidak diubah.');
            }
        }elseif ($id == 7) {
            if($request->hasFile('gbrsam')){
                $gbr  = Tentangs::where('id', 1)->first();
                File::delete('image/set/'.$gbr->gbrsam);
                $file = $request->file('gbrsam');
                Tentangs::whereId(1)->update(['gbrsam' => $file->getClientOriginalName()]);
                $file->move('image/set/', $file->getClientOriginalName());
                return redirect()->back()->with('sambut', 'Gambar Sambutan berhasil diubah.');
            }else{
                return redirect()->back()->with('sambut', 'Gambar Sambutan tidak diubah.');
            }
        }elseif ($id == 8) {
            Socs::whereId(1)->update([
                'yt' => $request->yt,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'tw' => $request->tw
            ]);
            return redirect()->back()->with('soc', 'Informasi Media Sosial berhasil diubah.');
        }elseif ($id == 9) {
            Settings::whereId(1)->update(['blnlgr_id' => $request->bulan]);
            $bln = Bulans::findorfail($request->bulan);
            return redirect()->back()->with('bulan', 'Menampilkan data pelanggaran siswa bulan '.$bln->nama);
        }
    }
}