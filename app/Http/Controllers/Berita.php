<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use File;

class Berita extends Controller{
    public function index(){
        $news = News::orderBy('id', 'desc')->paginate(20);
        return view('news.index', compact('news'));
    }

    public function create(){
        return view('news.buat');
    }

    public function store(Request $request){
        if ($request->hasFile('gbr')) {
            $file = $request->file('gbr');
            $fn   = $file->getClientOriginalName();
            $name = pathinfo($fn, PATHINFO_FILENAME);
            $ext  = pathinfo($fn, PATHINFO_EXTENSION);

            News::create([
                'judul' => $request->judul,
                'gbr'   => $request->judul.' - '.$name.'.'.$ext,
                'isi'   => $request->isi
            ]);
            
            $file->move('image/news/', $request->judul.' - '.$name.'.'.$ext);
            
            return redirect()->route('artikel.index')->with('berhasil', 'Artikel berhasil dibuat.');
        }else{
            return redirect()->back();
        }
    }

    public function show($id){
        
    }

    public function edit($id){
        $news = News::findorfail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id){
        if ($request->hasFile('gbr')) {
            $data = News::findorfail($id);
            File::delete('image/news/'.$data->gbr);

            $file = $request->file('gbr');
            $fn   = $file->getClientOriginalName();
            $name = pathinfo($fn, PATHINFO_FILENAME);
            $ext  = pathinfo($fn, PATHINFO_EXTENSION);

            News::whereId($id)->update([
                'judul' => $request->judul,
                'gbr'   => $request->judul.' - '.$name.'.'.$ext,
                'isi'   => $request->isi
            ]);
            
            $file->move('image/news/', $request->judul.' - '.$name.'.'.$ext);
            
            return redirect()->route('artikel.index')->with('berhasil', 'Artikel berhasil diubah.');
        }else{
            News::whereId($id)->update([
                'judul' => $request->judul,
                'isi'   => $request->isi
            ]);

            return redirect()->route('artikel.index')->with('berhasil', 'Artikel berhasil diubah.');
        }
    }

    public function destroy($id){
        $data = News::findorfail($id);
        File::delete('image/news/'.$data->gbr);
        News::destroy($id);
        return redirect()->back()->with('berhasil', 'Artikel berhasil dihapus.');
    }
}