<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgacts extends Model{
    use HasFactory;
    protected $fillable = ['kegiatans_id', 'img', 'desk'];

    public function Kegiatans(){
        return $this->belongsTo('App\Models\Kegiatans');
    }
}
