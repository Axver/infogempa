<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }

       .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #583283;
        color: white;
        text-align: center;
        height: 60px;
       }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse" style="background-color:#583283;color:white;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Login</a></li>
      <li><a href="leaflet.html">Jalur Evakuasi</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
    <div class="row">

      <?php

      //Load data auto gempa

      $list_gempa= new SimpleXMLElement('http://data.bmkg.go.id/en_autogempa.xml',null,true);
      foreach ($list_gempa->gempa as $row) {
        ?>
        <div class="col-sm-3">
        <div class="panel panel-info" style="width:320px;">
       <div class="panel-head" style="background-color:#583283; color:white;">
        <div class="row">
          <div class="col-sm-4">
           <h4><b><?php echo $row->Tanggal ; ?></b></h4>
          </div>


        <div class="col-sm-4">
        <h4><b><?php echo $row->Magnitude; ?></b></h4>
        </div>

          </div>
       </div>

        <div class="panel-body">
          <b>Kedalaman : <?php echo $row->Kedalaman; ?><br/></b>
          <?php echo $row->Wilayah1; ?><br/>
          <?php echo $row->Wilayah2; ?><br/>
          <?php echo $row->Wilayah3; ?><br/>
          <?php echo $row->Wilayah4; ?><br/>
          <?php echo $row->Wilayah5; ?><br/>

        </div>

        <div class="panel-footer" style="background-color:#583283; color:white">

          <?php if( $row->Potensi=="does not generate TSUNAMI")
           {

             echo "<b>Tidak Berpotensi Tsunami</b>";
           }
           else {
            echo "<b>Berpotensi Tsunami</b>";
           } ?>

        </div>

      </div>

    </div>

    <div class="col-sm-9" style="background-color:#583283; height:400px;">
      <div id="map">

      </div>
    </div>


   <?php
      }

       ?>

     </div>
     <div class="test" style="width:100%; height:330px; background-color:#734f9e;">
       <div class="panel panel-info" style="background-color:#734f9e; color:white;">

         <div class="panel-head">
         <h5><b>Lokasi Evakuasi Tsunami</b> </h5>
         </div>

         <div class="panel-body" style="height:300px; background-color:white;">

           <div class="row">
             <div class="col-sm-3">
               <div class="panel panel-info">
                 <div class="panel-head" style="background-color:#583283;">

                   <h3><b>Titik Tsunami Terbaru </b></h3>

                 </div>
                 <div class="panel-body" style="height:200px; width:300px; background-color:#734f9e;">
                 <img class="img-responsive" src="http://data.bmkg.go.id/tsunami.gif">
                 </div>

               </div>


             </div>

             <div class="col-sm-3" style="background-color=#583283">

               <div class="panel panel-info">
                 <div class="panel-head" style="color:white; background-color:#583283;">
                  <h3><b>Info Detail Tsunami Terbaru</b></h3>
                 </div>

                 <div class="panel-body" style="background-color=#583283;color:red;">
                   <?php

                   //Load data auto gempa

                   $list_tsunami= new SimpleXMLElement('http://data.bmkg.go.id/lasttsunami.xml',null,true);
                   foreach ($list_tsunami->Gempa as $row) {
                     ?>

                    <b>Tanggal: <?php echo $row->Tanggal ; ?></b> <br/>
                    <b>Jam: <?php echo $row->Jam ; ?></b> <br/>
                    <b>Area: <?php echo $row->Area ; ?></b> <br/>
                    <b>Linkdetail: <?php echo $row->Linkdetail ; ?></b> <br/>
                    <b>Kedalaman : <?php echo $row->Kedalaman ; ?></b> <br/>
                    <b>Magnitude : <?php echo $row->Magnitude ; ?></b> <br/>

                <?php
                   }

                    ?>
                 </div>
               </div>



             </div>


           </div>


             </div>

           </div>







         </div>

       </div>

     </div>
     <div class="test" style="width:100%; height:350px; background-color:#734f9e;">
       <div class="panel panel-info" style="background-color:#734f9e; color:white;">

         <div class="panel-head">
         <h3><b>Daftar Gempa Terkini</b> </h3>
         </div>

         <div class="panel-body" style="width:100%;">

           <div class="row">

             <?php

             //Load data auto gempa
            $i=0;
             $list_gempa= new SimpleXMLElement('http://data.bmkg.go.id/gempaterkini.xml',null,true);
             foreach ($list_gempa->gempa as $row) { if ($i<=5)
               {

               ?>

               <div class="col-sm-2">
              <h4 style="color:#a81f1f;">Tanggal : <?php echo $row->Tanggal ; echo "   "; ?> </h4>



              Jam : <?php echo $row->Jam ;echo "   "; ?><br/>

              Koordinat : <?php echo $row->point->coordinates ;echo "   "; ?><br/>
            <b style="color:red;">  Magnitude:<?php echo $row->Magnitude ;echo "   "; ?></b> <br/>
              Kedalaman : <?php echo $row->Kedalaman ; echo "   ";?><br/>
              <b>Wilayah : <?php echo $row->Wilayah ; echo "   ";?></b><br/>
              </div>




          <?php
          $i=$i+1;
             }

           }

              ?>

           </div>

         </div>
         </div>

       </div>
       </div>

     </div>

    <script>
     // Note: This example requires that you consent to location sharing when
     // prompted by your browser. If you see the error "The Geolocation service
     // failed.", it means you probably did not give permission for the browser to
     // locate you.

     function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: -34.397, lng: 150.644},
         zoom: 15
       });
       var infoWindow = new google.maps.InfoWindow({map: map});
       var trafficLayer = new google.maps.TrafficLayer();
       trafficLayer.setMap(map);


       // Try HTML5 geolocation.
       if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {
           var pos = {
             lat: position.coords.latitude,
             lng: position.coords.longitude
           };
           var marker = new google.maps.Marker({
           position: pos,
           map: map,
           animation: google.maps.Animation.BOUNCE,
           title: 'Posisi Anda'
       });

           infoWindow.setPosition(pos);
           infoWindow.setContent('Anda Berada Disini Sekarang');
           map.setCenter(pos);
         }, function() {
           handleLocationError(true, infoWindow, map.getCenter());
         });
       } else {
         // Browser doesn't support Geolocation
         handleLocationError(false, infoWindow, map.getCenter());
       }

     }



     function handleLocationError(browserHasGeolocation, infoWindow, pos) {
       infoWindow.setPosition(pos);
       infoWindow.setContent(browserHasGeolocation ?
                             'Error: The Geolocation service failed.' :
                             'Error: Your browser doesn\'t support geolocation.');
     }
   </script>
   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6F1J0IcRyPG81WDiHZIstogRcELqAKXk&callback=initMap">
   </script>



   <div class="footer">
   <p>Data Gempa : BMKG XML FILE</p>
 </div>

  </body>


</html>
