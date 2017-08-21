<?php

$data = 'ข้อมูล-1';
echo $data;
echo '<hr>';
$data2 = 100*6;
echo $data2;
echo '<hr>';
echo 'เริ่ม Array';
echo '<br>';
$array1 = ['a','b','c',10,'ก']; //element  //member
echo $array1[2];  // c
$array1[5]='xxxx';
echo '<br>';
echo '<pre>';
print_r($array1); 
echo '</pre>';
$array2 = [
    'name'=>'อุเทน',
    'lname'=>'จาดยางโทน',
    'age'=>37,
    'office'=>[
        'y2546'=>['สอ.A','สอ.B'],
        'y2560'=>'สสจ.พล'
    ]
];
echo $array2['lname'];
echo '<hr>';
echo $array2['office']['y2560'];

echo $array2['office']['y2546'][1];


echo '<hr>';
$array3 = [];
$array3[] = [
    'name'=>'a',
    'lname'=>'aaaa'
];

$array3[] = [
    'name'=>'b',
    'lname'=>'bbb'
];


echo '<pre>';
print_r($array3);
echo '</pre>';
echo json_encode($array3);











