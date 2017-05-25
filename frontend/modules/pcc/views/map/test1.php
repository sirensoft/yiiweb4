<?php
//เรียก lib
$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.js', ['position' => $this::POS_HEAD]);
?>

<div id='map' style="width: 100%;height: 75vh;">

</div>
<?php
$point = [];
$point[] = [
    'type' => 'Feature',
    'geometry' => [
        'type' => 'Point',
        'coordinates' => [100, 16]
    ],
    'properties' => [
        'title' => 'Hello',        
        'description'=> '155 9th St, San Francisco',
        
        'marker-color' => '#ff0000',
    ]
];

$point[] = [
    'type' => 'Feature',
    'geometry' => [
        'type' => 'Point',
        'coordinates' => [100.12, 16]
    ],
    'properties' => [
        'title' => 'Hello2',
        'marker-color' => '#00ff00',        
        'icon' => [
            'iconUrl' => 'https://www.mapbox.com/mapbox.js/assets/images/astronaut1.png',
            'iconSize' => [50, 50], // size of the icon
            'iconAnchor' => [25, 25], // point of the icon which will correspond to marker's location
            'popupAnchor' => [0, -25], // point from which the popup should open relative to the iconAnchor
            'className' => 'dot'
        ]
    ]
];


$point = json_encode($point,JSON_UNESCAPED_SLASHES);

$js = <<<JS
        
L.mapbox.accessToken = 'pk.eyJ1IjoibHRjIiwiYSI6ImNpeWUya3NkcTAwdTEyd214N3R0MWt0dmoifQ.q7C6rPbI2hphy4yMIMW82w';

var map = L.mapbox.map('map').setView([16,100], 6);
var baseLayers = {
	"OSM ภูมิประเทศ": L.mapbox.tileLayer('mapbox.streets'),  
        "OSM ถนน":L.tileLayer('//{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map),
        "OSM ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        
 };
// base layer     
        
var _group1 = L.layerGroup().addTo(map);
var pointLayer = L.mapbox.featureLayer();
pointLayer.on('layeradd', function(e) {
  var marker = e.layer,
  feature = marker.feature;
  if(feature.properties.icon){
    marker.setIcon(L.icon(feature.properties.icon));
  }
});
pointLayer.setGeoJSON($point).addTo(_group1);

        
var overlays={
  "พิกัดบ้าน":_group1,   
 };        

L.control.layers(baseLayers,overlays).addTo(map);
map.fitBounds(pointLayer.getBounds());

JS;
$this->registerJs($js);

