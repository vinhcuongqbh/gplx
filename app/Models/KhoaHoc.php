<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'KhoaHoc';
}
