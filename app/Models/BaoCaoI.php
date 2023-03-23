<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoCaoI extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'BaoCaoI';
    public $timestamps = false;
}
