<?php

use yii\helpers\Url;

$route_home = Url::to(['/mapbox/default/point-home']);
$tambon = $this->render('./tambon_plk_utf8.geojson');
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
                "Google Street": googleStreet,
                "Google ภูมิประเทศ": googleTerrain
            }; // base map 



            var _group1 = L.layerGroup().addTo(map);
            var person = L.mapbox.featureLayer().setGeoJSON(<?= $person_point ?>).addTo(_group1);
            var home = L.mapbox.featureLayer()
                    .loadURL('<?= $route_home ?>')
                    .on('ready', function (e) {
                        home.eachLayer(function (layer) {
                            console.log(layer.feature.properties);
                            if (!layer.feature.properties.title && !layer.feature.properties.description) {
                                layer.bindPopup(layer.feature.properties.NAME);
                            }
                        });
                    }).addTo(_group1);
            var github = L.mapbox.featureLayer().addTo(map);
            var tambon = L.mapbox.featureLayer()
                    .setGeoJSON(<?= $tambon ?>)
                    .addTo(map);
            map.fitBounds(tambon.getBounds());
            tambon.eachLayer(function (layer) {
                var fillColor = "#0000ff"
                if (layer.feature.properties.AMP_CODE <= '05') {
                    fillColor = "#00ff7f";
                } else if (layer.feature.properties.AMP_CODE >= '07') {
                    fillColor = "#ff4444";
                }
                layer.setStyle({
                    fillColor: fillColor,
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7,
                });
                layer.on('mouseover', function (e) {
                    var color = "#ffd700";
                    layer.setStyle({
                        fillColor: color,
                        weight: 5,
                        color: '#666',
                    });
                });
                layer.on('mouseout', function (e) {
                    layer.setStyle({
                        fillColor: fillColor,
                        weight: 2,
                        opacity: 1,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.7,
                    });

                    layer.closePopup();
                });
                layer.on('click', function (e) {
                    map.fitBounds(layer.getBounds());
                    layer.bindPopup(layer.feature.properties.TAM_NAMT);
                    layer.openPopup();
                });
            });

            //wms

            var nexrad = L.tileLayer.wms("http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi", {
                layers: 'nexrad-n0r-900913',
                format: 'image/png',
                transparent: true,
                attribution: "Weather data © 2012 IEM Nexrad"
            });
            var precipitation = L.tileLayer.wms('http://nowcoast.noaa.gov/arcgis/services/nowcoast/analysis_meteohydro_sfc_qpe_time/MapServer/WmsServer', {
                format: 'image/png',
                transparent: true,
                layers: '5'
            });
            
            var longdo = L.tileLayer.wms('http://dt.gistda.or.th/wms/theos?version=1.3.0',{
                format:'image/png',
                transparent: true,
                layers:'1',
                
                //srs:"EPSG:4326"
                
            });
            
        


            //wms

            var overlays = {
                "tambon": tambon,
                "person": person,
                "home": home,
                "github": github,
                "wms1": nexrad,
                "precipitation":precipitation,
                "longdo":longdo
                
            };
            L.control.layers(baseLayers, overlays).addTo(map);
            $(function () {
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