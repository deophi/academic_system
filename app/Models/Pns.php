<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pns extends Model{
    use HasFactory;
    protected $fillable = ['id', 'users_id', 'golongans_id'];

    public function Users(){
    	return $this->belongsTo('App\Models\Users');
    }

    public function Golongans(){
    	return $this->belongsTo('App\Models\Golongans');
    }
}
