<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiLX_HoSo extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'NguoiLX_HoSo';
    public $timestamps = false;
}
