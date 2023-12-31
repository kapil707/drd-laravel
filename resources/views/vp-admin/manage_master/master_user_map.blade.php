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
				<div id="map"></div>
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
setTimeout(function(){
  initMap();
}, 60000);
// Initialize and add the map
function initMap() {
	// The location of Uluru
	var locations = []

	<?php
	$i = 1;
	foreach ($result as $row)
	{
		?>
		locations.push(['<?php echo $row->user_altercode; ?> - <?php echo $row->getdate; ?> - <?php echo $row->gettime; ?>',<?php echo $row->latitude; ?>,<?php echo $row->longitude; ?>,<?php echo $i; ?>]);
		<?php
	} ?>
	locations.push(['DRD Office', 28.5183163, 77.279475, <?php echo $i; ?>]);

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
		<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>