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
					<table class="table table-striped table-bordered table-hover" id="example-table">
						<thead>
							<tr>
								<th>
									Sno.
								</th>
								<th>
									Gstvno
								</th>
								<th>
									Vdt
								</th>
								<th>
									Deliverby
								</th>
								<th>
									User Altercode
								</th>
								<th>
									Chemist Id
								</th>
								<th>
									Amt
								</th>
								<th>
									Update Time
								</th>
							</tr>
						</thead>
						<tbody>
						
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
<script>
$(document).ready(function(){
	let data = [];
	<?php
	$i = 1;
	foreach ($result as $row)
	{
		?>
		data.push(['<?= $i++; ?>', '<?= ($row->gstvno); ?>', '<?= ($row->vdt); ?>', '<?= ($row->user_altercode); ?>', '<?= ($row->chemist_code); ?>', '<?= ($row->chemist_id); ?>', '<?= ($row->amt); ?>','<?= ($row->dispatchtime);?>']);
		<?php
	}
	?>
	$('#example-table').DataTable({
		data: data,
		pageLength: 25,
		responsive: true,
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [
			{extend: 'copy'},
			{extend: 'csv'},
			{extend: 'excel', title: 'ExampleFile'},
			{extend: 'pdf', title: 'ExampleFile'},
			{extend: 'print',
				customize: function (win){
					$(win.document.body).addClass('white-bg');
					$(win.document.body).css('font-size', '10px');
					$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
			}
			}
		]
	});
});
</script>
<script src="https://cdn.datatables.net/scroller/2.2.0/js/dataTables.scroller.min.js"></script>