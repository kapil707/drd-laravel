<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Manage_master_Controller extends Controller
{	
    var $Page_title = "Manage Master";
	var $Page_name  = "manage_master";
	var $Page_view  = "manage_master";
	var $Page_menu  = "manage_master";
	var $page_controllers = "manage_master";
	var $Page_tbl   = "tbl_page";
	public function index(Request $request,$action_type="",$editid="")
	{
		/******************session***********************/
		$user_id = Session::get('admin_user_id');
		$user_type = Session::get('admin_user_type');
		/******************session***********************/
		$Page_title = $this->Page_title;
		$Page_name 	= $this->Page_name;
		$Page_view 	= $this->Page_view;
		$Page_menu 	= $this->Page_menu;
		$Page_tbl 	= $this->Page_tbl;
		$page_controllers 	= $this->page_controllers;
		//$this->Admin_Model->permissions_check_or_set($Page_title,$Page_name,$user_type);
		$data['title1'] = $Page_title." || View";
		$data['title2'] = "View";
		$data['Page_name'] = $Page_name;
		$data['Page_menu'] = $Page_menu;

		if($action_type==""){
			return redirect("vp-admin/".$page_controllers."/view");
		}

        $breadcrumbs = array(
            "Admin"=>"vp-admin/",
            "$Page_title"=>"vp-admin/$page_controllers/view",
            "View"=>"",);
        $data["breadcrumbs"] = $breadcrumbs;

		$tbl = $Page_tbl;

        $page_child_page = "";
        $data['page_child_page'] = $page_child_page;
        $data['page_url'] = "";

		$page_type = "page";

		if($action_type=="attendance"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();

			$mydate = date("Y-m-d");
			if(isset($_GET["date"])){
				$mydate = $_GET["date"];
			}
			$data["mydate"] = $mydate;
            
			$where = array('date'=>$mydate);
            $tbl = "tbl_attendance";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->where($where)->get();
		}

        if($action_type=="delivery"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();

			$mydate = date("Y-m-d");
			if(isset($_GET["date"])){
				$mydate = $_GET["date"];
			}
			$data["mydate"] = $mydate;
            
			$where = array('vdt'=>$mydate);
			$tbl = "drd_master_tbl_delivery";
			$data["result"] = \DB::connection('mysql2')->table($tbl)->where($where)->orderBy('gstvno','asc')->get();

			// print_r($data["result"]);
			// die();
		}

		if($action_type=="delivery_done"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();
			
			$mydate = date("Y-m-d");
			if(isset($_GET["date"])){
				$mydate = $_GET["date"];
			}
			$data["mydate"] = $mydate;

			$where = array('status'=>1,'date'=>$mydate);
            $tbl = "tbl_delivery_photo";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->where($where)->orderBy('id','desc')->get();

			// print_r($data["result"]);
			// die();
		}

		if($action_type=="meter"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();

			$mydate = date("Y-m-d");
			if(isset($_GET["date"])){
				$mydate = $_GET["date"];
			}
			$data["mydate"] = $mydate;
            
			$where = array('date'=>$mydate);
            $tbl = "tbl_meter";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->where($where)->orderBy('id','desc')->get();
		}

		if($action_type=="tracking"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();

			$mydate = date("Y-m-d");
			if(isset($_GET["date"])){
				$mydate = $_GET["date"];
			}
			$data["mydate"] = $mydate;
            
			$where = array('date'=>$mydate);
            $tbl = "tbl_tracking";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->where($where)->orderBy('id','desc')->get();
		}

		if($action_type=="firebase_token"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();
            
            $tbl = "tbl_firebase_token";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->get();
		}

		if($action_type=="check_url_api"){
			$input = $request->all();

			$url = $input["url"];
			$where = array('page_type'=>$page_type,'url'=>$url);
			if(!empty($input["id"])){
				$where = array('page_type'=>$page_type,'url'=>$url,'id'=>$id);
			}
			$result = Manage_page_Model::where($where)->get();
			if(empty($result)){
				return "ok";
			}else{
				return "Error";
			}
		}

		if($action_type=="master_user"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();
            
            $tbl = "tbl_tracking";
            $data["result"] = \DB::connection('mysql2')->table($tbl)->orderBy('id','desc')->get();
		}

		if($action_type=="master_user_map"){
        	// $where = array('page_type'=>$page_type);
  			// $data["result"] = DB::connection('mysql2')->table($tbl)->where($where)->get();
            
            //$tbl = "tbl_tracking";
            $data["result"] = \DB::connection('mysql2')->select("select DISTINCT t0.user_altercode,(select `latitude` from tbl_tracking as t1 where t1.user_altercode=t0.user_altercode order by id desc limit 1) as latitude,(select `longitude` from tbl_tracking as t1 where t1.user_altercode=t0.user_altercode order by id desc limit 1) as longitude,(select `getdate` from tbl_tracking as t1 where t1.user_altercode=t0.user_altercode order by id desc limit 1) as getdate,(select `gettime` from tbl_tracking as t1 where t1.user_altercode=t0.user_altercode order by id desc limit 1) as gettime FROM `tbl_tracking` as t0");
		}

		return view("vp-admin/$Page_view/$action_type")->with($data);
	}

	public function delete_page_rec()
	{
		$id = $_POST["id"];
		$Page_title = $this->Page_title;
		$Page_tbl = $this->Page_tbl;
		$result = $this->db->query("delete from $Page_tbl where id='$id'");
		if($result)
		{
			$message = "Delete Successfully.";
		}
		else
		{
			$message = "Not Delete.";
		}
		$message = $Page_title." - ".$message;
		$this->Admin_Model->Add_Activity_log($message);
		echo "ok";
	}
}
