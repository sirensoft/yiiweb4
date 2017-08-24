<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Yii2 กาญจนบุรี</title>
        <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
        <script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
        <style>
            body { margin:0; padding:0; }
            #map { position:absolute; top:0; bottom:0; width:100%; }
        </style>
    </head>
    <body>
        <?php

        use yii\helpers\Url;

$route = Url::to(['/report/json/tambon']);
        ?>
        <div id='map'></div>
        <script>
            L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
            var map = L.mapbox.map('map').setView([14.003510, 99.55066], 16);

            //base-map
            var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}&hl=th', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}&hl=th', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            var osmStreet = L.mapbox.tileLayer('mapbox.streets');

            var baseMap = {
                'OSM-ถนน': osmStreet,
                'Google-ถนน': googleStreet.addTo(map),
                'Google-ผสม': googleHybrid,
                'Google-ดาวเทียม': googleSat,
                //'ไม่แสดง': {}

            };

            var marker = L.marker([14.003510, 99.55066], {
                'draggable': true
            }).addTo(map);

            marker.on('dragend', function (e) {
                var latlng = marker.getLatLng();
                var lat = latlng.lat;
                var lng = latlng.lng;
                marker.bindPopup('<b>พิกัด: ' + lat + ',' + lng + '</b>');
                marker.openPopup();
                map.panTo(latlng);
            });

            var hosLayer = L.mapbox.featureLayer(<?= $json_hos ?>);

            var tmbLayer = L.mapbox.featureLayer().loadURL('<?= $route ?>');

            L.control.layers(baseMap, {
                'หน่วยบริการ': hosLayer.addTo(map),
                'ขอบเขตตำบล': tmbLayer.addTo(map)
            }).addTo(map);

            var legend = L.control({'position': 'buttomright'});

            legend.onAdd = function (map) {
                var div = L.DomUtil.create('div', 'info legend');
                var labels = ['<b>คำอธิบาย</b>'];

                labels.push('<i style="background:lime"></i>คะแนน 80-100');
                labels.push('<i style="background:yellow"></i>คะแนน 60-80');
                labels.push('<i style="background:red"></i>คะแนน <60');
                labels.push('');
                labels.push('<u>แหล่งข้อมูล</u>');
                labels.push('จากการสำรวจของหน่วยบริการ');
                labels.push('เฉพาะประชากรที่ยังมีชีวิตอยู่');
                div.innerHTML = labels.join('<br>');
                return div;
            };
            legend.addTo(map);






        </script>

    </body>
</html>


