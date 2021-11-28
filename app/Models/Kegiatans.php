<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatans extends Model{
    use HasFactory;
    protected $fillable = ['nama', 'users_id', 'isi', 'sub'];

    public function Users(){
        return $this->belongsTo('App\Models\Users');
    }
}
