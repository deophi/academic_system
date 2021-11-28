<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model{
    use HasFactory;
    protected $fillable = ['idkeluar', 'tujuan', 'surats_id', 'users_id', 'jenis', 'tempat', 'waktu', 'waktuend'];

    public function Surats(){
    	return $this->belongsTo('App\Models\Surats');
    }

    public function Users(){
    	return $this->belongsTo('App\Models\Users');
    }
}
