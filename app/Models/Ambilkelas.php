<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambilkelas extends Model{
    use HasFactory;
    protected $fillable = ['kelas_id' ,'users_id', 'angkatans_id'];

    public function Users(){
        return $this->belongsTo('App\Models\Users');
    }

    public function Kelas(){
        return $this->belongsTo('App\Models\Kelas');
    }

    public function Angkatans(){
        return $this->belongsTo('App\Models\Angkatans');
    }
}
