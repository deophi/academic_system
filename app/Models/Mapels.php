<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapels extends Model{
    use HasFactory;
    protected $fillable = ['nama', 'kat', 'users_id'];

    public function Kelas(){
    	return $this->belongsTo('App\Models\Kelas');
    }

    public function Users(){
    	return $this->belongsTo('App\Models\Users');
    }

    public function Kat(){
    	return $this->belongsTo('App\Models\Jurusans', 'kat', 'id');
    }
}
