<?php
header('Content-Type: application/json');
$existingEmails = ["test@example.com","user@domain.com","demo@gmail.com"];

$email = isset($_GET['email']) ? trim($_GET['email']) : '';
$response = ["available"=>true];

if($email===''){
    $response["available"]=false;
}else{
    foreach($existingEmails as $e){
        if(strcasecmp($e,$email)===0){
            $response["available"]=false;
            break;
        }
    }
}
echo json_encode($response);
