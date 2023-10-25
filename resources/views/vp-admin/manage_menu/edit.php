<div class="row">
	<div class="col-xs-12" style="margin-bottom:20px;">
		<a href="<?= base_url()?>admin/<?= $Page_name; ?>" class="btn btn-w-m btn-info">
			Back
		</a>
	</div>
	<?php foreach ($result as $row) { ?> 
	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="group_child_page" class="css_group_child_page" value="<?php echo $row->child_page ?>">
		<div class="col-xs-9">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<label class="control-label" for="form-field-1">
									Group Page Type
								</label>
							</div>
							<div class="col-sm-12">
								<select name="group_page_type" id="group_page_type" data-placeholder="Select Group Type" class="chosen-select group_page_type_0" onchange="onchange_select_group_page_type(0)">
									<option value="0">
										Select Group Page Type
									</option>
									<?php $this->Manage_field_group_model->get_field_group_set_page_type($row->page_type,$row->child_page) ?>
								</select>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="col-sm-12">
								<label class="control-label" for="form-field-1">
									Group Page
								</label>
							</div>
							<div class="col-sm-12 get_field_group_set_page_div">
								<select name="group_page_id" id="group_page_id" data-placeholder="Select Group Page" class="chosen-select">
									<option value="0">
										Select Group Page
									</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<div class="col-sm-12">
								<label class="control-label" for="form-field-1">
									Title
								</label>
							</div>
							<div class="col-sm-12">
								<input type="text" class="form-control title" id="form-field-1" placeholder="Title" name="title" value="<?php echo $row->title; ?>" required />
							</div>
							<div class="help-inline col-sm-12 has-error">
								<span class="help-block reset middle">  
									<?= form_error('title'); ?>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="col-sm-12">
								<label class="control-label" for="form-field-1">
									Parent Menu
								</label>
							</div>
							<div class="col-sm-4">
								<select name="menu_id" id="menu_id" data-placeholder="Select Parent Menu" class="chosen-select">
									<option value="0">
										Select Parent Menu
									</option>
									<?php
									$query = $this->db->query("select * from tbl_menu where status=1")->result();
									foreach($query as $r){
										?>
										<option value="<?php echo $r->id ?>" <?php if($r->id==$row->menu_id) { ?> selected <?php } ?>>
										<?php echo $r->title ?>
										</option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<?php publish_panel_right_top($row,"Update"); ?>
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Sorting Order
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="form-field-1" placeholder="Sorting Order" name="sorting_order" value="<?php echo $row->sorting_order; ?>" required />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('sorting_order'); ?>
							</span>
						</div>
					</div>

					<hr>
					<?php  admin_side_image("Image","image","",$row->image,"",""); ?>
					
					<hr>
					<?php  admin_side_image("Mobile Image","mobile_image","",$row->mobile_image,"",""); ?>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>
</div>
<script>
<?php if($row->page_type) { ?>
setTimeout(
function(){
	change_select_group_page_type('<?php echo $row->page_type ?>','<?php echo $row->child_page ?>','<?php echo $row->page_id ?>');
}, 500);
<?php }?>
function onchange_select_group_page_type(id){
	page_type  = $('.group_page_type_'+id+' option:selected').val();
	child_page = $('.group_page_type_'+id+' option:selected').attr("child_page");
	
	$(".css_group_child_page").val(child_page)
	change_select_group_page_type(page_type,child_page)
}
function change_select_group_page_type(page_type,child_page,page_id)
{	
	$.ajax({
	type       : "POST",
	data       :  {page_type:page_type,child_page:child_page,page_id:page_id} ,
	url        : "<?= base_url()?>admin/<?= $Page_name?>/change_select_group_page_type_api",
	success    : function(data){
			if(data!="")
			{
				$('.get_field_group_set_page_div').html(data);
				$('.chosen-select').chosen({width: "100%"})
			}					
			else
			{
				java_alert_function("error","Something Wrong")
				$('.url_error').html("Something Wrong");
			}
		}
	});
}
function onchanage_page_info(){
	page_type = $('#group_page_id option:selected').val();
	page_title =  $('#group_page_id option:selected').attr("page_title");
	page_url =  $('#group_page_id option:selected').attr("page_url");
	
	$(".title").val(page_title)
	$(".url").val(page_url)
	v = '<?= base_url(); ?>'+page_url;
	page_url = "Permalink : <a href='"+v+"' target='_blank'>"+v+"</a>";
	$(".url1").html(page_url)
}
</script>