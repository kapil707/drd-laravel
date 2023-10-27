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
					<table class="table table-striped table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>
									Sno.
								</th>
								<th>
									gstvno
								</th>
								<th>
									vdt
								</th>
								<th>
									deliverby
								</th>
								<th>
									user_altercode
								</th>
								<th>
									amt
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
let data = [];
// for (let i = 0; i < 50000; i++) {
//     data.push([i, i, i, i, i]);
// }

for (let i = 0; i < 50000; i++) {
    data.push([i, i, i, i, i]);
}
new DataTable('#example', {
    data: data,
    deferRender: true,
    scrollCollapse: true,
    scroller: true,
    scrollY: 200
});
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
