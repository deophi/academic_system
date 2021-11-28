<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fouls extends Model{
    use HasFactory;
    protected $fillable = ['users_id', 'piket_id', 'jenis_id', 'angkatans_id', 'jam', 'mapel', 'keterangan'];

    public function Users(){
        return $this->belongsTo('App\Models\Users', 'users_id', 'id');
    }

    public function Piket(){
        return $this->belongsTo('App\Models\Users', 'piket_id', 'id');
    }

    public function Jenis(){
        return $this->belongsTo('App\Models\Jenis');
    }

    public function Angkatans(){
        return $this->belongsTo('App\Models\Angkatans');
    }
}
