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
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover dataTables-example">
						<thead>
							<tr>
								<th>
									Sno.
								</th>
								<th>
									Title
								</th>
								<th>
									Update Time
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
							<tr id="row_<?= $row->id; ?>" <?php if($row->status==0){ ?> class="text-warning" <?php } ?>>
								<td>
									<?= $i++; ?>
								</td>
								<td>
									<?= ($row->title); ?>
								</td>
								<td>
									<?php
									echo ($row->updated_at);
									?>
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
