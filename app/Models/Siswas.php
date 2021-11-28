<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswas extends Model{
    use HasFactory;
    protected $fillable = ['users_id', 'nis', 'nisn', 'jurusans_id'];

    public function Users(){
    	return $this->belongsTo('App\Models\Users');
    }

    public function Jurusans(){
    	return $this->belongsTo('App\Models\Jurusans');
    }
}
