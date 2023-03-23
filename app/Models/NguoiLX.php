<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiLX extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'NguoiLX';
    public $timestamps = false;
}
