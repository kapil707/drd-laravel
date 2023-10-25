@include('vp-admin/header_footer/header')
<div class="row">
    <div class="col-xs-12">
    	<form class="form-horizontal" role="form" method="post" action="{{ URL('vp-admin/profile_management/submit')}}">
            @csrf
            <div class="form-group">
                <div class="col-sm-2 text-right">
                    <label class="col-sm-12 control-label">
                        Select User Type
                    </label>
                </div>
                <div class="col-sm-10">
                    <select name="user_type" id="user_type" class="form-control" required="required" onchange="user_type_onchange()">
                        <option value="">
                            Select User Type
                        </option>
                        <?php
                        foreach($user_type_result as $row)
                        {
                            ?>
                            <option value="<?= $row->user_type; ?>"
                            <?php if($row->user_type==$user_type){ echo "selected"; } ?>>
                                <?= $row->user_title; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="page_type_div">
        		<div class="col-sm-12">
                    <div class="col-sm-6">
                        All Permission
                    </div>
                    <div class="col-sm-6">
                        Permission Of Category
                    </div>
             	</div>
           		<div class="col-sm-12">
                	<select class="form-control dual_select" multiple name="page_type[]" id="page_type">
                	<?php
					foreach($permission_page_result as $row)
					{
						$page_type = $row->page_type;
                        $where = array('user_type'=>$user_type,'page_type'=>$page_type);
                        $row1 = DB::table('tbl_permission_settings')->where($where)->first();
						?>
						<option value="<?= $page_type; ?>"
                            <?php if($row1->page_type==$page_type) {
                                echo "selected"; }?>>
							<?= $row->page_title; ?>
						</option>
						<?php
					}
					?>
					</select>
                </div>
            </div>

            <div class="form-group text-right">
            	<input type="submit" class="ladda-button ladda-button-demo btn btn-primary submitbtn" value="Permission Set" name="Submit" onclick="return check_all_value_not_null()" style="display:none" />
            </div>
     	</form>
    </div>
	<div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                    <tr>
                    	<th>
                        	Sno.
                        </th>
						<th>
                        	Page Title
                        </th>
                        <th>
                        	Page Fa Fa Icon
                        </th>
						<th>
                        	Sorting
                        </th>
                    </tr>
                </thead>
				<tbody>
                <?php
				$i=1;
                foreach ($page_result as $row)
                {
					?>
                    <tr id="row_<?= $row->id; ?>">
                    	<td>
                        	<?= $i++; ?>
                        </td>
 						<td>
                        	<?= $row->page_title; ?>
                        </td>
						<td>
							<input type="text" value="" onchange="change_fafa_icon('<?= $row->id; ?>')" class="fafa_icon_<?= $row->id; ?>">
							<?= base64_decode($row->fafa_icon); ?>
                        </td>
						<td>
							<input type="number" value="<?= $row->sorting_order; ?>" onchange="change_sorting_order('<?= $row->id; ?>')" class="sorting_order_<?= $row->id; ?>">
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function user_type_onchange()
{
	var user_type = $("#user_type option:selected").val();
	$(".submitbtn").show();
	if(user_type=="")
	{
		$(".submitbtn").hide();
	}
	if(user_type=="")
	{
		java_alert_function("warning","Select User Type")

		$.ajax({
			type       : "POST",
			data       :  { user_type:user_type } ,
			url        : "admin/profile_management/get_permission_settings",
			success    : function(data){
				if(data!="")
				{
					$("#page_type_div").html(data);
					$('.dual_select').bootstrapDualListbox({
					selectorMinimalHeight: 160
					});
				}
				else
				{
					java_alert_function("error","Something Wrong")
				}
			}
		});
	}
	else
	{
		$.ajax({
			type       : "POST",
			data       :  { user_type:user_type } ,
			url        : "admin/profile_management/get_permission_settings",
			success    : function(data){
				if(data!="")
				{
					$("#page_type_div").html(data);
					$('.dual_select').bootstrapDualListbox({
					selectorMinimalHeight: 160
					});
				}
				else
				{
					java_alert_function("error","Something Wrong")
				}
			}
		});
	}
}
function check_all_value_not_null()
{
	var user_type = $("#user_type option:selected").val();
	$(".submitbtn").show();
	if(user_type=="")
	{
		$(".submitbtn").hide();
		java_alert_function("warning","Select User Type")
		return false;
	}
	/*var page_type = $("#page_type option:selected").text();
	if(page_type=="")
	{
		java_alert_function("warning","Select Permission Page")
		return false;
	}*/
}

var change_fafa_icon1 = 0;
function change_fafa_icon(id)
{
	if(change_fafa_icon1==0)
	{
		fafa_icon = $(".fafa_icon_"+id).val();
		change_fafa_icon1 = 1;
		$.ajax({
			type       : "POST",
			data       :  { id:id,fafa_icon:fafa_icon,} ,
			url        : "admin/<?= $Page_name; ?>/change_fafa_icon",
			success    : function(data){
				if(data!="")
				{
					java_alert_function("success","Update Successfully");
				}
				else
				{
					java_alert_function("error","Something Wrong")
				}
				change_fafa_icon1 = 0;
			}
		});
	}
}

var change_sorting_order1 = 0;
function change_sorting_order(id)
{
	if(change_sorting_order1==0)
	{
		sorting_order = $(".sorting_order_"+id).val();
		change_sorting_order1 = 1;
		$.ajax({
			type       : "POST",
			data       :  { id:id,sorting_order:sorting_order,} ,
			url        : "admin/<?= $Page_name; ?>/change_sorting_order",
			success    : function(data){
				if(data!="")
				{
					java_alert_function("success","Update Successfully");
				}
				else
				{
					java_alert_function("error","Something Wrong")
				}
				change_sorting_order1 = 0;
			}
		});
	}
}
</script>
@include('vp-admin/header_footer/footer')
