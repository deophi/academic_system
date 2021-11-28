<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model{
    use HasFactory;
    protected $fillable = ['angkatans_id', 'blnlgr_id', 'mail', 'telp', 'fax', 'web', 'alamat', 'logo', 'kop', 'ttd'];

    public function Angkatans(){
        return $this->belongsTo('App\Models\Angkatans');
    }

    public function Blnlgr(){
    	return $this->belongsTo('App\Models\Bulans', 'blnlgr_id', 'id');
    }

    public function Blnsrt(){
    	return $this->belongsTo('App\Models\Bulans', 'blnsrt_id', 'id');
    }
}
