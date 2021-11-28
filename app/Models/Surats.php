<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surats extends Model{
    use HasFactory;
    protected $fillable = ['id', 'suratds_id', 'nama'];

    public function Suratds(){
    	return $this->belongsTo('App\Models\Suratds');
    }
}
