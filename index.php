<?php
if (isset($_POST['login'])) {
    $arr[0] = $_POST['login'];
}
if (isset($_POST['password'])) {
    $arr[1] = $_POST['password'];
}
$data[] = ['login', 'password'];
$data[] = $arr;
var_dump($data);

$filename = 'data.csv';

$file = fopen($filename, 'w');

if ($file !== false) {
    foreach($data as $row){
        fputcsv($file, $row);
    }
}

fclose($file);