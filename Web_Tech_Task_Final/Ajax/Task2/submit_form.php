<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$required = ['name','email','phone','subject','message'];
foreach($required as $f){
    if(!isset($data[$f]) || trim($data[$f])===''){
        echo json_encode(["success"=>false,"message"=>"Missing $f"]); exit;
    }
}

$ref = strtoupper(substr(md5(uniqid()),0,8));
echo json_encode(["success"=>true,"ref"=>$ref]);
