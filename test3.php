
<?php function maps($x,$y){ ?>
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<div style='overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:300px;width:400px;'></div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>
function init_map(x,y)
{   
    var myOptions = {zoom:16,center:new google.maps.LatLng(x,y),mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(x,y)});
infowindow = new google.maps.InfoWindow({content:'<strong>名稱</strong><br>No.238, Shizheng N. 2nd Rd., Xitun Dist., Taichung City 407, Taiwan (R.O.C.)<br>'});
google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
}
    var x ="<?php echo $x?>" ; //賦值x = $x
    var y ="<?php echo $y?>" ; //賦值y = $y

google.maps.event.addDomListener(window, 'load', init_map(x,y));
</script>
<?php } ?>

<?php echo maps(24.1631079,120.63786619999996); ?> 

     <!--http://embedgooglemaps.com/en/-->
     <!--http://map-generator.net/en#-->
     
     <!--24.1631079,120.63786619999996 = 中佑集團,河南店-->
     
     <!--http://www.codingcage.com/2015/01/php-oop-crud-tutorial-with-mysql-part-2.html  物件導向php oop mysql -->
     
  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://disclaimergenerator.net">disclaimer generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(22.6352056,120.28738610000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng()});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>高雄市三民區建國320號<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>