<?php
session_start();
?>





<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js"
            type="text/javascript"></script>
    <script type="text/javascript">
        //<![CDATA[
        var customIcons = {
            restaurant: {
                icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
            },
            bar: {
                icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
            }
        };
        function load() {
            var map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(55, -3),
                zoom: 5,
                mapTypeId: 'roadmap'
            });
            var infoWindow = new google.maps.InfoWindow;
            // Change this depending on the name of your PHP file
            downloadUrl("hello.php", function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                for (var i = 0; i < markers.length; i++) {
                    var name = markers[i].getAttribute("name");
                    var address = markers[i].getAttribute("address");
                    var type = markers[i].getAttribute("type");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = "<b>" + name + "</b> <br/>" + address;
                    var icon = customIcons[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: icon.icon
                    });
                    bindInfoWindow(marker, map, infoWindow, html);
                }
            });
        }
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }
        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };
            request.open('GET', url, true);
            request.send(null);
        }
        function doNothing() {}
        //]]>
    </script>

</head>
<body onload="load()">

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php
        if ($_SESSION["user"] != null) {
            echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
            echo "<p id='loginText'>currently not logged in";
        }
        ?>
    </div>
    <script>
        function logout() {
            window.location = "SearchBB.php?value=logout";
        }
    </script>
</section>


<section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="B&Bregistration.php">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>



<section class="googlemap" id="mapapi">






<!--
    <script>
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(57.2, -2.2), zoom: 10
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        function viewonmap(){

            map = new google.maps.Map()

        }


    </script>
-->

</section>

<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">
        <p>Here are your search results...</p>

</div>
    </section>


<section class="container" id="content2">


    <div class="main">

        <div id="mapView">

            <div id="map" style="width:425px;height:425px;background:snow"></div>

        </div>


    <?php

    $city = $_POST['location'];
    echo "<p>You searched for ".$city.". Results are ordered by ascending price</p>";
    $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    try{
        $st = $conn-> query("SELECT * FROM [B&B] WHERE [city] = '$city' ORDER BY [price]");

$count=0;
$locations;
        foreach($st->fetchAll() as $row) {
            $newhtml =
                <<<NEWHTML
                    <div class="table4" id="{$count}">

    <p class="{$count}" id="bbname"><strong>{$row[bbname]}</strong></p>
    <p class="{$count}" id="email"><strong>{$row[email]}</strong></p>
    <p class="{$count}" id="price"><strong>£{$row[price]} Per Night</strong></p>
    <p class="{$count}" id="address"><strong>{$row[address]}</strong></p>
    <p class="{$count}" id="long"><strong>{$row[longitude]}</strong></p>
    <p class="{$count}" id="lat"><strong>{$row[latitude]}</strong></p>





    <p><a href="Customerinfo.php"><input type="submit" value="BOOK" /></a></p>
    <p ><input type="submit" id="viewonmap" value="View on Map" />{$row[longitude]},{$row[latitude]}</p>



</div>
NEWHTML;

            $locations[$count] = ("{$row[longitude]},{$row[latitude]}");
            $count++;
            print($newhtml);

        }
    }
    catch(PDOException $e)
    {print"$e";}
    ?>

</div>
    </section>


<section class="spacer" id="spacer">


</section>

<section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="B&Bregistration.php">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>



    <div id="copyright">
        <hr width="100%" size="1">
        <p>Copyright. Team D Solutions.</p>
    </div>

</section>




</body>
</html>
