<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filedata extends Model
{
    protected $table = "files";
 
    protected $fillable = ['file','keterangan','ekstensi'];
}