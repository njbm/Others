<?php

require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Ambulance;

$status = Utility::sanitize($_POST['status']);
$sta_color = Utility::sanitize($_POST['color']);

if($status=='Free' && $sta_color=='badge-success')
{
    $sta_color = 'badge-danger';
    $status = 'Busy';
}
else
{
    $sta_color = 'badge-success';
    $status = 'Free';
}



$ambu = new Ambulance();

$ambu->id = Utility::sanitize($_POST['id']); 
$ambu->ambulence_no =  Utility::sanitize($_POST['number']);      
$ambu->driver_name =  Utility::sanitize($_POST['name']);
$ambu->location =  Utility::sanitize($_POST['loc']);
$ambu->phone =  Utility::sanitize($_POST['phone']);
$ambu->status =  $status;
$ambu->status_color = $sta_color;

$result = $ambu->updateStatus($ambu);

if($result)
{
    $message = 'Ambulence Status is updated successfully';
    set_session('message',$message);
    redirect('add-ambulence-admin.php');
}