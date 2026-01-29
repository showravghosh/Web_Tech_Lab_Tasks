<?php
header('Content-Type: application/json');

$file = 'students.json';

if(!file_exists($file)){
    echo json_encode(["error" => "Data file not found."]);
    exit;
}

$data = file_get_contents($file);
if(!$data){
    echo json_encode(["error" => "No data available."]);
    exit;
}

$students = json_decode($data, true);
if($students === null){
    echo json_encode(["error" => "Invalid JSON data."]);
    exit;
}

echo json_encode($students);
