<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentangs extends Model{
    use HasFactory;
    protected $fillable = ['sambutan', 'gbrsam', 'ytembed', 'slog'];
}
