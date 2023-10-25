<?php
if ( ! function_exists('publish_panel_right_top'))
{
	function publish_panel_right_top($row,$submit_text){
		?>
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<label>Publish</label>
				<div class="form-group">
					<div class="col-sm-12">
						<?php if($submit_text=="Update") { ?>
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<?php
							$time = ($row->update_time);
							echo "Update Time : ".date('d M,Y', $time)." at ".date('H:i', $time);
						} ?>
					</div>
				</div>
				<hr>
				<?php if($row!="not") { ?>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label" for="form-field-1">
							Status
						</label>
					</div>
					<div class="col-sm-12">
						<select name="status" id="status" data-placeholder="Select Status" class="chosen-select">
							<?php
							$status = 0;
							if(!empty($row)){
								$status = $row->status;
							}
							?>
							<option value="1" <?php if($status==1) { ?> selected <?php } ?>>
								Active
							</option>
							<option value="0" <?php if($status==0) { ?> selected <?php } ?>>
								Inactive
							</option>
						</select>
					</div>
					<div class="help-inline col-sm-12 has-error">
						<span class="help-block reset middle">

						</span>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<div class="col-md-6" style="margin-top:10px;">
						<?php if($submit_text=="Update") { ?>
						<a href="javascript:void(0)" onclick="delete_page_rec('<?= $row->id; ?>')" class="text-danger">Move to Trash</i> </a>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-block btn-primary submit_button" name="Submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							<?php echo $submit_text ?>
						</button>
						<span class="btn btn-block btn-danger submit_button_disabled" name="Submit" style="display:none">
							<i class="ace-icon fa fa-check bigger-110"></i>
							<?php echo $submit_text ?>
						</span>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
?>
