@include('vp-admin/header_footer/header')
<div class="row">
	<div class="col-xs-12" style="margin-bottom:20px;">
		<a href="{{ URL('vp-admin/')}}/<?= $Page_name; ?>" class="btn btn-w-m btn-info">
			Back
		</a>
	</div>
	<?php
	foreach ($result as $row)
	{ ?>
	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="post_data" value="edit">
		<div class="col-xs-9">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Title
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control title" id="form-field-1" placeholder="Title" name="title" value="<?php echo $row->title; ?>" onchange="onchange_title()" />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Description
							</label>
						</div>
						<div class="col-sm-12">
							<textarea type="text" class="form-control summernote" id="form-field-1" placeholder="Description" name="description" style="height:100px"><?php echo $row->description; ?></textarea>
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Excerpt
							</label>
						</div>
						<div class="col-sm-12">
							<textarea type="text" class="form-control" id="form-field-1" placeholder="Excerpt" name="excerpt" style="height:100px"><?php echo $row->excerpt; ?></textarea>
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								
							</span>
						</div>
					</div>					
				</div>
			</div>
			<?php //$this->Manage_field_group_model->get_field_group_to_show_box("page",$row->id);?>
		</div>
		<div class="col-xs-3">
			<?php publish_panel_right_top($row,"Update"); ?>
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Url
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control url" id="form-field-1" placeholder="Url" name="url" value="<?php echo $row->url; ?>" onchange="onchange_url()" />
						</div>
						<div class="col-sm-12">
							<span class="url1">
								Permalink : <?php /*<a href='<?= base_url(); ?><?php echo $row->url; ?>' target='_blank'><?= base_url(); ?><?php echo $row->url; ?></a> */ ?>
							</span>
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle url_error">  
								
							</span>
						</div>
					</div>
					
					<hr>
					<?php //$this->Manage_field_group_model->get_all_type_of_category_to_join_in_page($row->join_page_id); ?>
					
					<hr>
					<?php //admin_side_image("Image","image","",$row->image,"",""); ?>
					
					<hr>
					<?php //admin_side_image("Mobile Image","mobile_image","",$row->mobile_image,"",""); ?>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>
</div>
<?php /*
<script>
function onchange_title()
{
	url = $(".url").val();
	if(url==""){
		title = $(".title").val();
		title = title.replace(/&/g,'and');
		title = title.trim(title).replace(/ /g,'-');
		title = encodeURI(title).replace(/[!\/\\#,+()$~%.'":*?<>{}]/g,'');
		$(".url").val(title)
		v = '<?= base_url(); ?><?= $page_url ?>/'+title;
		url1 = "Permalink : <a href='"+v+"' target='_blank'>"+v+"</a>";
		$(".url1").html(url1)
		check_url(title)
	}
}
function onchange_url()
{
	url = $(".url").val();
	if(url!=""){
		title = $(".url").val();
		title = title.replace(/&/g,'and');
		title = title.trim(title).replace(/ /g,'-');
		title = encodeURI(title).replace(/[!\/\\#,+()$~%.'":*?<>{}]/g,'');
		v = '<?= base_url(); ?><?= $page_url ?>/'+title;
		url1 = "Permalink : <a href='"+v+"' target='_blank'>"+v+"</a>";
		$(".url1").html(url1)
		check_url(title)
	}
}
var check_url_btn = 0;
function check_url(url)
{
	check_url_btn = 1;
	check_btn_in_page();
	
	page_url = "<?= $page_url ?>";
	id = "<?= $row->id ?>";
	$.ajax({
	type       : "POST",
	data       :  {url:url,id:id,page_url:page_url} ,
	url        : "<?= base_url()?>admin/<?= $Page_name?>/check_url_api",
	success    : function(data){
			if(data!="")
			{
				if(data=="Error")
				{
					java_alert_function("error","This Url Already Taken")
					$('.url_error').html("This Url Already Taken");
				}
				if(data=="ok")
				{
					java_alert_function("success","Url Ok");
					$('.url_error').html("Url Ok");
					check_url_btn = 0;
					check_btn_in_page()
				}
			}					
			else
			{
				java_alert_function("error","Something Wrong")
				$('.url_error').html("Something Wrong");
			}
		}
	});
}
function check_btn_in_page(){
	
	disabled_submit_button(1); // 1 say disabled hota ha
	if(check_url_btn==0){
		disabled_submit_button(0);
	}
}
</script> */ ?>
@include('vp-admin/header_footer/footer')