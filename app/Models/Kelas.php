<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model{
    use HasFactory;
    protected $fillable = ['nama', 'wali_id', 'jurusans_id', 'tingkat', 'angkatans_id'];

    public function Jurusans(){
        return $this->belongsTo('App\Models\Jurusans');
    }

    public function Angkatans(){
        return $this->belongsTo('App\Models\Angkatans');
    }

    public function Wali(){
        return $this->belongsTo('App\Models\Users', 'wali_id', 'id');
    }
}
