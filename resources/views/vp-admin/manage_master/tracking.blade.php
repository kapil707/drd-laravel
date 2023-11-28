@include('vp-admin/header_footer/header')
<div class="row">
    <div class="col-xs-12" style="margin-bottom:20px;">
		<a href="{{ URL('vp-admin/')}}/<?= $Page_name; ?>/add" class="btn btn-w-m btn-info">
			Add +
		</a>
	</div>
	<div class="col-xs-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<form method="get">
					@csrf
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
								<div class="input-group date nk-int-st">
									<label>Select Date</label>
									<input type="date" class="form-control" value="<?php echo $mydate; ?>" name="date">
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-right">
							<button type="submit" name="submit" class="btn btn-success notika-btn-success waves-effect" value="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="col-xs-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover dataTables-example">
						<thead>
							<tr>
								<th>
									Sno.
								</th>
								<th>
								user_code
								</th>
								<th>
								user_altercode
								</th>
								<th>
								firebase_token
								</th>
								<th>
								latitude
								</th>
								<th>
								longitude
								</th>
								<th>
								data/time
								</th>
								<th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
						foreach ($result as $row)
						{
							?>
							<tr id="row_<?= $row->id; ?>">
								<td>
									<?= $i++; ?>
								</td>
								<td>
									<?= ($row->user_code); ?>
								</td>
								<td>
									<?= ($row->user_altercode); ?>
								</td>
								<td>
									<?= ($row->firebase_token); ?>
								</td>
								<td>
									<?= ($row->latitude); ?>
								</td>
								<td>
									<?= ($row->longitude); ?>
								</td>
								<td>
									<?= ($row->date);?>
									<?= ($row->time);?>
								</td>
								<td class="text-right">
									<div class="btn-group">
										<a href="edit/<?= $row->id; ?>" class="btn-white btn btn-xs">Edit
										</a>
										<a href="javascript:void(0)" onclick="delete_page_rec('<?= $row->id; ?>')" class="btn-white btn btn-xs">Delete</i> </a>
									</div>
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
    </div>
</div>
<script>
var delete_rec1 = 0;
function delete_rec(id)
{
	if (confirm('Are you sure Delete?')) {
	if(delete_rec1==0)
	{
		delete_rec1 = 1;
		$.ajax({
			type       : "POST",
			data       :  { id : id ,} ,
			url        : "{{ URL('vp-admin/')}}/<?= $Page_name; ?>/delete_rec",
			success    : function(data){
					if(data!="")
					{
						java_alert_function("success","Delete Successfully");
						$("#row_"+id).hide("500");
					}
					else
					{
						java_alert_function("error","Something Wrong")
					}
					delete_rec1 = 0;
				}
			});
		}
	}
}
</script>
@include('vp-admin/header_footer/footer')
