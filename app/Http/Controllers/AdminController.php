<?php

namespace App\Http\Controllers;

use App\Models\Model_tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    var $Page_title = "Manage Dashbord";
    public function admin_submit(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $input = $request->all();
        // print_r($input);
        // echo Crypt::encrypt($input['password']);
        $admin_user = Model_tbl_user::where('email',$input['username'])->get();
        if(Crypt::decrypt($admin_user[0]->password1)==$input['password']){
            $request->session()->put('admin_user_id',$admin_user[0]->id);
            $request->session()->put('admin_user_type',$admin_user[0]->user_type);
            /*********************************** *
            $admin_user = Model_tbl_user::find($admin_user[0]->id);
            $admin_user->login_date = date("Y-m-d");
            $admin_user->login_time = date("H:i");
            $admin_user->save();
            /*********************************** */

            return redirect("vp-admin/dashboard");
        }else{
            return back()->with('fail','login fail');
        }
    }

    public function dashboard(){

        $Page_title = $this->Page_title;

        $data["Page_menu"] = "dashboard";
        $data["page_type"] = "dashboard";
        $data["page_child_page"] = "title";
        $data["Page_name"] = "title";
        $data["title1"] = "title";
        $data["title1"] = "title";

        $breadcrumbs = array(
            "Admin"=>"vp-admin/",
            "$Page_title"=>"vp-admin/dashboard/view",
            "View"=>"",);
        $data["breadcrumbs"] = $breadcrumbs;
        
        return view('vp-admin/dashboard/index')->with($data);
    }


}
