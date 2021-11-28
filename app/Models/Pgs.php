<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgs extends Model{
    use HasFactory;
    protected $fillable = ['users_id', 'pos_id', 'gd', 'gb'];

    public function Users(){
    	return $this->belongsTo('App\Models\Users');
    }

    public function Pos(){
    	return $this->belongsTo('App\Models\Pos');
    }
}
