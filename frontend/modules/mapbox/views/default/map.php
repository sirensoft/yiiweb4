<?php

use yii\helpers\Url;

$route_home = Url::to(['/mapbox/default/layer-home']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>MAPBOX</title>
        <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='../../mapboxjs/mapbox.js'></script>
        <link href='../../mapboxjs/mapbox.css' rel='stylesheet' />
        <style>
            body { margin:0; padding:0; }
            #map { position:absolute; top:0; bottom:0; width:100%; }
        </style>
    </head>
    <body>
        <div id='map'></div>
        <script>
            L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
            var map = L.mapbox.map('map').setView([16, 100], 6);
            //base map
            var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            var osm_street = L.mapbox.tileLayer('mapbox.streets');

            var baseLayers = {
                "OSM ภูมิประเทศ": osm_street,
                "OSM ถนน": L.tileLayer('//{s}.tile.osm.org/{z}/{x}/{y}.png'),
                "OSM ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
                "Google Hybrid": googleHybrid,
                "Google Street": googleStreet.addTo(map),
                "Google ภูมิประเทศ": googleTerrain
            };// base map 

            var _group1 = L.layerGroup().addTo(map);

            var person = L.mapbox.featureLayer().setGeoJSON(<?= $person_point ?>).addTo(_group1);

            var home = L.mapbox.featureLayer()
                    .loadURL('<?= $route_home ?>')
                    .on('ready', function (e) {
                        //map.fitBounds(home.getBounds());

                        e.target.eachLayer(function (layer) {                           
                            console.log(layer.properties);
                        });
                    }).addTo(_group1);


            var github= L.mapbox.featureLayer().addTo(map);
            
            var overlays = {
                "person": person,
                "home": home,
                "github":github
            };

            L.control.layers(baseLayers, overlays).addTo(map);
           
           
            
            $(function(){
                $.ajax({
                    headers: {
                        'Accept': 'application/vnd.github.v3.raw'
                    },
                    xhrFields: {
                        withCredentials: false
                    },
                    dataType: 'json',
                    url: 'https://api.github.com/repos/mapbox/mapbox.js/contents/test/manual/example.geojson',
                    success: function (geojson) {
                        // On success add fetched data to the map.
                        github.setGeoJSON(geojson);
                    }
                });
            });

        </script>
    </body>
</html>