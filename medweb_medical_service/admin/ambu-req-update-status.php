<?php
require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\AmbulanceReq;

// store the data from user to json

$status = Utility::sanitize($_POST['status']);   
$sta_color = Utility::sanitize($_POST['color']);   


if($status == 'Pending' && $sta_color == 'badge-secondary')
{
    $sta_color = 'badge-success';
    $status = 'Assigned';
}

$req = new AmbulanceReq();

$req->id = Utility::sanitize($_POST['id']); 
$req->patient_name =  Utility::sanitize($_POST['name']);      
$req->address =  Utility::sanitize($_POST['address']);
$req->phone =  Utility::sanitize($_POST['phone']);
$req->message =  Utility::sanitize($_POST['message']);
$req->status =  $status;
$req->status_color = $sta_color;

$result = $req->updateStatus($req);

if($result)
{
    $message = "Ambulance Request Status is updated successfully";
    set_session('message', $message);
    redirect('ambulence-req-check.php');
}



