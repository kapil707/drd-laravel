<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Profile_Management_Controller extends Controller
{
    public function index(){
        $data["Page_menu"] = "dashboard";
        $data["page_type"] = "dashboard";
        $data["page_child_page"] = "title";
        $data["Page_name"] = "title";
        $data["title1"] = "title";
        $data["title1"] = "title";

        $data["user_type"] = "Super_admin";

        $data["user_type_result"] = DB::table('tbl_user_type')->get();
        $data["permission_page_result"] = DB::table('tbl_permission_page')->get();
        $data["page_result"] = DB::table('tbl_permission_page')->get();
        return view('vp-admin/profile_management/index')->with($data);
    }
}
