<div class="row">
	<?php /* <div class="col-xs-12" style="margin-bottom:20px;">
		<a href="<?= base_url()?>admin/<?= $Page_name; ?>" class="btn btn-w-m btn-info">
			Back
		</a>
	</div> */ ?>
	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		<div class="col-xs-9">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Site Title
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="form-field-1" placeholder="Site Title" name="site_title" value="<?php echo get_field_data("site_title"); ?>" />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('site_title'); ?>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Site Tagline
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="form-field-1" placeholder="Site Taglinee" name="site_tagline" value="<?php echo get_field_data("site_tagline"); ?>" />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('site_tagline'); ?>
							</span>
						</div>
					</div>

					<?php admin_side_image("Image (Favicon)","image_site_favicon","","image_site_favicon","field",""); ?>
				
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<?php publish_panel_right_top("not","Submit"); ?>
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<?php admin_side_image("Image (Logo)","image_site_logo","","image_site_logo","field-12",""); ?>
					<hr>
					<?php admin_side_image("Mobile Image (Logo)","mobile_image_site_logo","","mobile_image_site_logo","field-12",""); ?>
				</div>
			</div>
		</div>
	</form>
</div>