<?php
use frontend\modules\map\assets\MapAsset;
MapAsset::register($this);

?>

<div id='map' style="height: 450px">
    
</div>
<?php
$js = <<<JS
    L.mapbox.accessToken = 'pk.eyJ1IjoibHRjIiwiYSI6ImNpeWUya3NkcTAwdTEyd214N3R0MWt0dmoifQ.q7C6rPbI2hphy4yMIMW82w';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([16,100], 12);    
JS;

$this->registerJS($js);
