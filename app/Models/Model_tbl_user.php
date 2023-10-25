<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_tbl_user extends Model
{
    use HasFactory;
    protected $table = "tbl_user";
    protected $primarKey = "id";
}
