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

<div id="map"></div>
<script>
setTimeout(function(){
  initMap();
}, 60000);
// Initialize and add the map
function initMap() {
	// The location of Uluru
	var locations = [
						
				["BALRAM MISHRA - (1) <br> Date / Time:-2023-01-11,20:12", 30.7490302, 76.7781106, 1],
								
				["RAMESH KUMAR - (2) <br> Date / Time:-2023-10-04,18:31", 28.5181975, 77.27924, 2],
								
				["SATYDEV - (172) <br> Date / Time:-2023-03-20,18:28", 28.5182724, 77.2796441, 3],
								
				["NANDAN DAS ---9821930543 - (608) <br> Date / Time:-2023-09-22,00:49", 29.5816832, 74.3284855, 4],
								
				["AMBRISH MISHRA - (502) <br> Date / Time:-2023-01-14,19:40", 28.5182528, 77.2797099, 5],
								
				["RAJAT KUMAR-9773834617 - (540) <br> Date / Time:-2023-03-28,11:36", 28.5182543, 77.2797018, 6],
								
				["PRADIP PASWAN -9953605568 - (551) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 7],
								
				["MD ISLAM UDDIN-9999500764 - (881) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 8],
								
				["RAHUL KUMAR SINGH-9717410908 - (585) <br> Date / Time:-2023-01-14,19:20", 28.5182128, 77.2794803, 9],
								
				["HARISH  KUMAR --8802320707 - (595) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 10],
								
				["ASIF - (610) <br> Date / Time:-2023-10-03,12:40", 29.5816871, 74.3284959, 11],
								
				["PARMESH - (613) <br> Date / Time:-2023-10-06,09:18", 29.581692, 74.3283963, 12],
								
				["KARAN SINGH--9821304274 - (631) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 13],
								
				["OM PRAKASH 9643469069 - (612) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 14],
								
				["RAMAN KUMAR KAMAT(8800717059) - (639) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 15],
								
				["YOGESH -9958702094 - (648) <br> Date / Time:-2023-01-14,15:20", 28.5182575, 77.2796597, 16],
								
				["MD.JABIR (8383859292) - (674) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 17],
								
				["SUJIT KUMAR - (611) <br> Date / Time:-2023-10-06,09:27", 29.5816882, 74.3284719, 18],
								
				["MONU PAL 8130876505 - (691) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 19],
								
				["KISOR KUMAR GUPTA-8510890840 - (689) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 20],
								
				["CHANDAN - (609) <br> Date / Time:-2023-09-15,00:19", 29.581635, 74.3284, 21],
								
				["IZLAL AHMED (8830968545) - (813) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 22],
								
				["RITIK SHAKYA-9651717210 - (796) <br> Date / Time:-2023-08-03,19:56", 28.5074771, 77.2792741, 23],
								
				["ASHOK CHATURVEDI-9911873775 - (856) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 24],
								
				["SANTANU-(9717485712) - (865) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 25],
								
				["SAHDEV(8920303389) - (877) <br> Date / Time:-2022-12-17,13:19", 28.5181992, 77.2795617, 26],
								
				["ARVIND TEWARI-9537635807 - (804) <br> Date / Time:-2022-12-29,23:21", 28.5207667, 77.2855525, 27],
								
				["RAJESH KUMAR THAKUR - (930) <br> Date / Time:-,", , , 28],
								
				["ASHOK BAR- 89298 98898 - (989) <br> Date / Time:-,", , , 29],
								
				["SURAJ CHUTERBADY-7409942552 - (1029) <br> Date / Time:-,", , , 30],
								
				["RIZWAN -9639661766 - (1039) <br> Date / Time:-,", , , 31],
								
				["RANJEET-7309436879 - (1124) <br> Date / Time:-,", , , 32],
								
				["BALWANT-9718207965 - (1150) <br> Date / Time:-,", , , 33],
							['DRD Office', 28.5183163, 77.279475, 34] 
			];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(28.5183163, 77.279475),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    

    for (i = 0; i < locations.length; i++) {
      if(i!=0)
      {  
        const icon = {
                url: "https://drdweb.co.in/img_v31/marker_b.png", // url
                scaledSize: new google.maps.Size(30, 30), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
          };
          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          icon:icon
        });
      }
      if(i==0)
      {
        const icon2 = {
              url: "https://drdweb.co.in/img_v31/marker_a.png", // url
              scaledSize: new google.maps.Size(30, 30), // scaled size
              origin: new google.maps.Point(0,0), // origin
              anchor: new google.maps.Point(0, 0) // anchor
        };
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          icon:icon2
        });
      }
      
      

      

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	setTimeout(function(){
initMap();
}, 60000);
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
	    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk6NFMae16LWi-fas3PwpwI0F9S21ZSyI&callback=initMap">
    </script>