<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapelkelas extends Model{
    use HasFactory;
    protected $fillable = ['kelas_id', 'mapels_id', 'hari', 'awal', 'akhir'];

    public function Kelas(){
    	return $this->belongsTo('App\Models\Kelas');
    }

    public function Mapels(){
    	return $this->belongsTo('App\Models\Mapels');
    }
}
