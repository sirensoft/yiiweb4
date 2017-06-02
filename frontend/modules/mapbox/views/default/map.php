<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>MAPBOX</title>
        <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
        <script src='../../mapboxjs/mapbox.js'></script>
        <link href='../../mapboxjs/mapbox.css' rel='stylesheet' />
        <style>
            body { margin:0; padding:0; }
            #map { position:absolute; top:0; bottom:0; width:100%; }
        </style>
    </head>
    <body onload="load()">
        <div id='map'></div>
        <script>
            L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
            var map = L.mapbox.map('map', 'mapbox.streets').setView([16, 100], 8);
            var person = L.mapbox.featureLayer().setGeoJSON(<?=$person_point?>);
            person.addTo(map);
           
        </script>
    </body>
</html>