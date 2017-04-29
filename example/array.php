<?php
$arr = "Hello";
echo $arr;
echo "<hr>";
$array = ['a','b','c','d',2,0];
//print_r($array);
echo $array[3];

echo "<hr>";
$array2 = [
    '1'=>'a',
    '2'=>'b',
    '3'=>'c',
    '5'=>'d',
    '8'=>['a','b','c','6'=>'Hellow'],
    '10'=>0
];


echo "<pre>";
print_r($array2);
echo "</pre>";
echo "<hr>";
echo $array2[8][6];
echo "<hr>";
$json = json_encode($array2);
echo $json;







?>