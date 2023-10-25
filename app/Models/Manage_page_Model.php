<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manage_page_Model extends Model
{
    use HasFactory;
    protected $table = "tbl_page";
    protected $primarKey = "id";
    //public $timestamps = false;

    // protected $fillable = [
	// 	'title',
	// ];
}
