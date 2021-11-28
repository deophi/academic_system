<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socs extends Model{
    use HasFactory;
    protected $fillable = ['yt', 'ig', 'fb', 'tw'];
}
