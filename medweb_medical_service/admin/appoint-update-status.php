<?php
require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Appointment;
// store the data from user to json

$status = Utility::sanitize($_POST['status']);
$sta_color = Utility::sanitize($_POST['color']);


if($status == 'Pending' && $sta_color == 'badge-secondary')
{
    $sta_color = 'badge-success';
    $status = 'Accept';
}

$appoint = new Appointment();

$appoint->id = Utility::sanitize($_POST['id']);
$appoint->patient_name =  Utility::sanitize($_POST['name']);      
$appoint->doctor_name =  Utility::sanitize($_POST['doctor']);
$appoint->gender =  Utility::sanitize($_POST['gender']);
$appoint->address = Utility::sanitize($_POST['address']);
$appoint->phone =  Utility::sanitize($_POST['phone']);
$appoint->message =  Utility::sanitize($_POST['message']);
$appoint->status =  $status;
$appoint->status_color =  $sta_color;

$result = $appoint->updateStatus($appoint);

if($result)
{
    $message = "Appointment Request Status is updated successfully";
    set_session('message', $message);
    redirect('add-appointment.php');
}



