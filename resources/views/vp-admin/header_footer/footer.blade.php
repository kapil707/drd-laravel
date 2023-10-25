						</div>
                    </div>
                </div>
                <div class="footer">
                     <div class="pull-right">
						Powered by Vp-Panel
					</div>
					<div>
						All rights are reserved  &copy; <?php echo date("Y") ?>
					</div>
                </div>
            </div>
        </div>
	</div>
    <!-- Mainly scripts -->
    <script src="{{asset('vp-admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('vp-admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('vp-admin/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <!-- Peity -->
    <script src="{{asset('vp-admin/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('vp-admin/js/demo/peity-demo.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{asset('vp-admin/js/inspinia.js')}}"></script>
    <script src="{{asset('vp-admin/js/plugins/pace/pace.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{asset('vp-admin/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- GITTER -->
    <script src="{{asset('vp-admin/js/plugins/gritter/jquery.gritter.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('vp-admin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Sparkline demo data  -->
    <script src="{{asset('vp-admin/js/demo/sparkline-demo.js')}}"></script>
    <!-- ChartJS-->
    <script src="{{asset('vp-admin/js/plugins/chartJs/Chart.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('vp-admin/js/plugins/toastr/toastr.min.js')}}"></script>



    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
				  "closeButton": true,
				  "debug": false,
				  "progressBar": true,
				  "preventDuplicates": false,
				  "positionClass": "toast-top-right",
				  "onclick": null,
				  "showDuration": "400",
				  "hideDuration": "1000",
				  "timeOut": "7000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				};
				<?php /*
				if($this->session->flashdata('message_footer')!="")
				{

					if($this->session->flashdata('message_type')=="success")
					{
						?>
							toastr.success('<?= $this->session->flashdata('full_message'); ?>');
						<?php
					}
					if($this->session->flashdata('message_type')=="info")
					{
						?>
							toastr.info('<?= $this->session->flashdata('full_message'); ?>');
						<?php
					}

					if($this->session->flashdata('message_type')=="warning")
					{
						?>
							toastr.warning('<?= $this->session->flashdata('full_message'); ?>');
						<?php
					}
					if($this->session->flashdata('message_type')=="error")
					{
						?>
							toastr.error('<?= $this->session->flashdata('full_message'); ?>');
						<?php
					}
				} */ ?>
            }, 1300);
        });

		function java_alert_function(message_type,full_message)
		{
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "progressBar": true,
			  "preventDuplicates": false,
			  "positionClass": "toast-top-right",
			  "onclick": null,
			  "showDuration": "400",
			  "hideDuration": "5000",
			  "timeOut": "7000",
			  "extendedTimeOut": "5000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};
			if(message_type=="success")
			{
				toastr.success(full_message);
			}
			if(message_type=="info")
			{
				toastr.info(full_message);
			}

			if(message_type=="warning")
			{
				toastr.warning(full_message);
			}
			if(message_type=="error")
			{
				toastr.error(full_message);
			}
		}
    </script>
	<script src="{{asset('vp-admin/js/plugins/dataTables/datatables.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
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
<!-- Data picker -->
   <script src="{{asset('vp-admin/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

  <script>
$('#data_5 .input-daterange').datepicker({
	keyboardNavigation: false,
	forceParse: false,
	autoclose: true,
	format: 'dd-MM-yyyy'
});  </script>
<!-- Dual Listbox -->
<script src="{{asset('vp-admin/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js')}}"></script>
<script>
$(document).ready(function(){
$('.dual_select').bootstrapDualListbox({
selectorMinimalHeight: 160
});
check_login();
get_latitude_longitude();
});
</script>
<!-- Chosen -->
    <script src="{{asset('vp-admin/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <!-- Jasny -->
    <script src="{{asset('vp-admin/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
   <!-- Switchery -->
   <script src="{{asset('vp-admin/js/plugins/switchery/switchery.js')}}"></script>

<script>
$(document).ready(function(){
$('.chosen-select').chosen({width: "100%"});
var elem = document.querySelector('.js-switch');
var switchery = new Switchery(elem, { color: '#1AB394' });
var elem1 = document.querySelector('.js-switch1');
var switchery1 = new Switchery(elem1, { color: '#1AB394' });
var elem2 = document.querySelector('.js-switch2');
var switchery2 = new Switchery(elem2, { color: '#1AB394' });
var elem3 = document.querySelector('.js-switch3');
var switchery3 = new Switchery(elem3, { color: '#1AB394' });
var elem4 = document.querySelector('.js-switch4');
var switchery4 = new Switchery(elem4, { color: '#1AB394' });
var elem5 = document.querySelector('.js-switch5');
var switchery5 = new Switchery(elem5, { color: '#1AB394' });
});
</script>
<div class="script_load"></div>
<script>
function onchange_theme_header()
{
	id = $("#theme_header").val();
	$.ajax({
	type       : "POST",
	data       :  { id : id } ,
	url        : "admin/dashboard/onchange_theme_header",
	success    : function(data){
			if(data=="ok")
			{
				java_alert_function("success","Theme Set");
			}
		}
	});
}
function onchange_theme_footer()
{
	id = $("#theme_footer").val();
	$.ajax({
	type       : "POST",
	data       :  { id : id } ,
	url        : "admin/dashboard/onchange_theme_footer",
	success    : function(data){
			if(data=="ok")
			{
				java_alert_function("success","Website Type Set");
			}
		}
	});
}
function onchange_theme_slider()
{
	id = $("#theme_slider").val();
	$.ajax({
	type       : "POST",
	data       :  { id : id } ,
	url        : "admin/dashboard/onchange_theme_slider",
	success    : function(data){
			if(data=="ok")
			{
				java_alert_function("success","Website Type Set");
			}
		}
	});
}
function check_login()
{
	var time1="yoyo";
	$.ajax({
	type       : "POST",
	data       :  { time1 : time1 } ,
	url        : "admin/dashboard/check_login",
	success    : function(data){
			if(data=="notok")
			{
				window.location.href = "admin"
			}
			else
			{
				if(data=="update")
				{
					window.location.href = "admin/dashboard"
				}
				else
				{
					$(".script_load").html(data);
				}
			}
		}
	});
	setTimeout('check_login();',1000);
	//show_now_time1();
}
function notify(pgtype)
{
	$.ajax({
	type       : "POST",
	data       :  { pgtype : pgtype } ,
	url        : "admin/dashboard/notify",
	success    : function(data){
			if(data)
			{
				$("#"+pgtype+"_div").html(data)
			}
		}
	});
}
function disabled_submit_button(id)
{
	$(".submit_button").show();
	$(".submit_button_disabled").hide();
	if(id==1){
		$(".submit_button").hide();
		$(".submit_button_disabled").show();
	}
}
function delete_field_data_image(id,field_name){

	if (confirm('Are you sure Delete?')) {
		$.ajax({
		type       : "POST",
		data       :  {id:id},
		url        : "admin/manage_field_group/delete_field_data_image",
		success    : function(data){
				if(data!="")
				{
					if(data=="Error")
					{
						java_alert_function("error","Image Not Delete");
					}
					if(data=="ok")
					{
						java_alert_function("success","Image Deleted");
						$(".img_default_field_css_"+field_name).html('')

						$("."+field_name+"_default_field_css").val('')
						$("."+field_name+"_imgtag").hide()
						$("."+field_name+"_image_delete_btn").hide()
					}
				}
				else
				{
					java_alert_function("error","Something Wrong");
				}
			}
		});
	}
}
function delete_page_image(field_name){

	if (confirm('Are you sure Delete?')) {
		java_alert_function("success","Image Deleted");
		$(".img_default_field_css_"+field_name).html('')

		$("."+field_name+"_default_field_css").val('')

		$("."+field_name+"_imgtag").hide()
		$("."+field_name+"_image_delete_btn").hide()
	}
}
var delete_page_rec1 = 0;
function delete_page_rec(id)
{
	if (confirm('Are you sure Delete?')) {
	if(delete_page_rec1==0)
	{
		delete_page_rec1 = 1;
		$.ajax({
			type       : "POST",
			data       :  {id:id,} ,
			url        : "admin/<?= $Page_name; ?>/delete_page_rec",
			success    : function(data){
					if(data!="")
					{
						java_alert_function("success","Delete Successfully");
						$("#row_"+id).hide("500");
						child_page = "<?php echo $page_child_page!='' ?>";
						if(child_page){
							window.location.href = 'admin/<?= $Page_name; ?>/?child_page=<?php echo $page_child_page ?>';
						}else{
						window.location.href = 'admin/<?= $Page_name; ?>/';
						}
					}
					else
					{
						java_alert_function("error","Something Wrong")
					}
					delete_page_rec1 = 0;
				}
			});
		}
	}
}
function open_modal_of_select_image_or_upload(field_name){
	$('.open_modal_of_select_image_or_upload').click();

	$(".div_select_image_or_upload_api").html('');

	$(".field_name_for_modal").val(field_name);
	select_image_or_upload_load(field_name,0);
}
function open_modal_of_select_image_or_upload_reload(){

	$(".div_select_image_or_upload_api").html('');
	field_name = $(".field_name_for_modal").val();
	select_image_or_upload_load(field_name,0);
}
function select_image_or_upload_load(field_name,limit) {
	$(".load_more_id_"+limit).html('Loading....')
	$.ajax({
		type       : "POST",
		data       :  {field_name:field_name,limit:limit} ,
		url        : "admin/manage_library/select_image_or_upload_api",
		success    : function(data){
			if(data!="")
			{
				$(".load_more_id_"+limit).html('')
				$(".div_select_image_or_upload_api").append(data)
			}
			else
			{
				java_alert_function("error","Something Wrong")
			}
		}
	});
}
function set_image_in_page(field_name,id){

	url = $("."+id+"_image_url").attr("url");
	$(".close_modal_of_select_image_or_upload").click();

	$("."+field_name+"_default_field_css").val(id)

	$("."+field_name+"_imgtag").show()
	$("."+field_name+"_imgtag").attr("src",url);
}
function upload_image_in_library()
{
	upload_image_in_library_file = $(".upload_image_in_library_file").val();
	if(upload_image_in_library_file=="")
	{
		java_alert_function("error","Select File");
		$(".upload_image_in_library_file").focus();
		return;
	}

	var file_data = $('.upload_image_in_library_file').prop('files')[0];
	var form_data = new FormData();
    form_data.append('library_image',file_data);

	$('.upload_image_in_library_file_drop').hide();
	$('.upload_image_in_library_btn').hide();
	$('.upload_image_in_library_loading').show();

	$.ajax({
		url: "admin/manage_library/upload_image_in_library_api",
		/*dataType: 'text',*/
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'post',
		error: function(){
		},
		success: function(data){
			java_alert_function("success","File uploaded successfully");
			$('.upload_image_in_library_file_drop').show();
			$('.upload_image_in_library_btn').show();
			$('.upload_image_in_library_loading').hide();
		},
		timeout: 40000
	});
}
</script>
<!-- Button trigger modal -->
<a href="" class="open_modal_of_select_image_or_upload" data-toggle="modal" data-target="#exampleModal"></a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="width: 1200px;">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" class="field_name_for_modal">
				<h5 class="modal-title" id="exampleModalLabel">Select Image Or Upload</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li>
						<a data-toggle="tab" href="#upload_files_tab">Upload Files</a>
					</li>
					<li class="active">
						<a data-toggle="tab" href="#media_library_tab" onclick="open_modal_of_select_image_or_upload_reload()">Media Library</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="upload_files_tab" class="tab-pane fade">
						<h3 class="text-center" style="padding:20px;">Upload Files</h3>
						<div style="height:370px;overflow: scroll;overflow-x: hidden;">
							<label for="images" class="upload_image_in_library_file_drop">
								<span class="upload_image_in_library_file_drop_title">Drop files here</span>
								or
								<input type="file" class="upload_image_in_library_file" accept="image/*" required>
							</label>

							<button onclick="upload_image_in_library()" class="btn btn-primary upload_image_in_library_btn" style="width:20%;margin-left: 40%; margin-top:100px;">Upload File</button>

							<span class="upload_image_in_library_loading" style="display:none;margin-left: 40%; margin-top:100px;">Uploading....</span>
						</div>
					</div>
					<div id="media_library_tab" class="tab-pane fade in active">
						<h3 class="text-center" style="padding:20px;">Media Library</h3>
						<div style="height:370px;overflow: scroll;overflow-x: hidden;">
							<div class="div_select_image_or_upload_api">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close_modal_of_select_image_or_upload" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Selected</button>
			</div>
		</div>
	</div>
</div>
<!-- SUMMERNOTE -->
<script src="{{asset('vp-admin/js/plugins/summernote/summernote.min.js')}}"></script>
<script>
$(document).ready(function(){
	$('.summernote').summernote();
});
</script>
</body>
</html>
<style>
.upload_image_in_library_file_drop {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}
.upload_image_in_library_file_drop:hover{
  background: #eee;
  border-color: #111;
}
.upload_image_in_library_file_drop:hover .upload_image_in_library_file_drop_title {
  color: #222;
}
.upload_image_in_library_file_drop_title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}
.upload_image_in_library_file {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #555;
}
.upload_image_in_library_file::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}
.upload_image_in_library_file::file-selector-button:hover {
  background: #0d45a5;
}
</style>
