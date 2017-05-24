<?php
//เรียก lib
$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.1.1/mapbox.js', ['position' => $this::POS_HEAD]);
?>
<h4>แผนที่บ้านผู้ป่วย</h4>
<div id='map' style="width: 100%;height: 75vh;">
    
</div>

<?php
use frontend\modules\pcc\models\Person;
$model = Person::find()->asArray()->all();

$peron_point =[];

foreach ($model as $value) {
    if($value['lat']*1 > 0){
        $peron_point[] = [
            'type'=>'Feature',
            'properties'=>[
                'NAME'=>$value['name'],
                'LNAME'=>$value['lname']
            ],
            'geometry'=>[
                'type'=>'Point',
                'coordinates'=>[$value['lon']*1,$value['lat']*1]
            ]    
        ];  
    }
}

/*
$peron_point[] = [
    'type'=>'Feature',
    'properties'=>[
        'NAME'=>'นาย ก',
        'LNAME'=>'ใจดี'
    ],
    'geometry'=>[
        'type'=>'Point',
        'coordinates'=>[100,16]
    ]    
];

$peron_point[] = [
    'type'=>'Feature',
    'properties'=>[
        'NAME'=>'นาย ข',
        'LNAME'=>'ใจดี'
    ],
    'geometry'=>[
        'type'=>'Point',
        'coordinates'=>[100.145,16.014]
    ]    
];*/

$person_point = json_encode($peron_point);
//print_r($peron_point);

// script
$js=<<<JS
L.mapbox.accessToken = 'pk.eyJ1IjoibHRjIiwiYSI6ImNpeWUya3NkcTAwdTEyd214N3R0MWt0dmoifQ.q7C6rPbI2hphy4yMIMW82w';
var map = L.mapbox.map('map', 'mapbox.streets').setView([16.324,100.456], 9);
        
//base map
var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
        
var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
        
var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
       
var baseLayers = {
	"OSM ภูมิประเทศ": L.mapbox.tileLayer('mapbox.streets'),  
        "OSM ถนน":L.tileLayer('//{s}.tile.osm.org/{z}/{x}/{y}.png'),
        "OSM ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        "Google Hybrid":googleHybrid,
        "Google Street":googleStreet.addTo(map),
        "Google ภูมิประเทศ":googleTerrain
 };
// base map 
L.control.layers(baseLayers).addTo(map);
        
var marker = L.marker(new L.LatLng(16.324,100.456), {
    
    draggable: true
});

marker.addTo(map);
        
marker.on("dragend",function(e){
    var pos = e.target.getLatLng();
    this.bindPopup(pos.toString()).openPopup();
});
        
L.geoJson($person_point).addTo(map);
        
        
JS;
$this->registerJs($js);



