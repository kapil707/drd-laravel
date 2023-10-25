<div class="row">
	<div class="col-xs-12" style="margin-bottom:20px;">
		<a href="<?= base_url()?>admin/<?= $Page_name; ?>/<?php echo $child_page ?>" class="btn btn-w-m btn-info">
			Back
		</a>
	</div>
	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="options_id" value="<?php echo $options_id = get_page_type_to_options_id($_GET["page_type"]); ?>">
		<div class="col-xs-9">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Blog pages show at most	
							</label>
						</div>
						<div class="col-sm-4">
							<input type="number" class="form-control" id="form-field-1" placeholder="Blog pages show at most" name="blog_page_number" value="<?php echo get_field_data("blog_page_number",0,$options_id); ?>" min=0 max=999 />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('blog_page_number'); ?>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Blog menu show at most	
							</label>
						</div>
						<div class="col-sm-4">
							<input type="number" class="form-control" id="form-field-1" placeholder="Blog menu show at most" name="blog_menu_number" value="<?php echo get_field_data("blog_menu_number"); ?>" min=0 max=999 />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('blog_menu_number'); ?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<?php publish_panel_right_top("not","Submit"); ?>
		</div>
	</form>
</div>