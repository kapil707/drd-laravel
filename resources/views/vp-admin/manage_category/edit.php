<div class="row">
	<div class="col-xs-12" style="margin-bottom:20px;">
		<a href="<?= base_url()?>admin/<?= $Page_name; ?>" class="btn btn-w-m btn-info">
			Back
		</a>
	</div>
	<?php
	foreach ($result as $row)
	{ ?>
	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="title_old" value="<?php echo $row->title; ?>" />
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
							<input type="text" class="form-control" id="form-field-1" placeholder="Title" name="title" value="<?php echo $row->title; ?>" required />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('title'); ?>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Slug
							</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="form-field-1" placeholder="Slug" name="slug" value="<?php echo $row->slug; ?>" required />
						</div>
						<div class="help-inline col-sm-12 has-error">
							<span class="help-block reset middle">  
								<?= form_error('slug'); ?>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label" for="form-field-1">
								Parent Category
							</label>
						</div>
						<div class="col-sm-4">
							<select name="category_id" id="category_id" data-placeholder="Select Parent Category" class="chosen-select">
								<option value="0">
									Select Parent Category
								</option>
								<?php
								$query = $this->db->query("select * from tbl_category where status=1")->result();
								foreach($query as $r){
									?>
									<option value="<?php echo $r->id ?>" <?php if($r->id==$row->category_id) { ?> selected <?php } ?>>
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
		<div class="col-xs-3">
			<?php publish_panel_right_top($row,"Update"); ?>
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<?php $this->Manage_field_group_model->get_all_type_of_category_to_join_in_page($row->join_page_id); ?>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>
</div>