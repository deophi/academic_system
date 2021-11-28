<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    use HasFactory;
    protected $fillable = ['email', 'password', 'tempat', 'lahir', 'levels_id', 'name', 'jks', 'alamat', 'hp', 'gambar', 'bio'];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    
    public function Ambilkelas(){
        return $this->belongsTo('App\Models\Ambilkelas', 'id', 'users_id');
    }

    public function Levels(){
        return $this->belongsTo('App\Models\Levels');
    }

    public function Jurusans(){
        return $this->belongsTo('App\Models\Jurusans');
    }

    public function Siswa(){
        return $this->belongsTo('App\Models\Siswas', 'id', 'users_id');
    }

    public function Pns(){
        return $this->belongsTo('App\Models\Pns', 'id', 'users_id');
    }
}
