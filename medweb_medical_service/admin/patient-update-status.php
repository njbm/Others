<?php
require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Patient;

// store the data from user to json
$status = $_POST['status'];
$sta_color = $_POST['color'];

if($status=='Admitted' && $sta_color=='badge-success')
{
    $sta_color = 'badge-secondary';
    $status = 'Discharged';
}


$patient = new Patient();

$patient->id = Utility::sanitize($_POST['id']);  
$patient->patient_name =  Utility::sanitize($_POST['name']);      
$patient->age =  Utility::sanitize($_POST['age']);
$patient->address =  Utility::sanitize($_POST['address']);
$patient->phone =  Utility::sanitize($_POST['phone']);
$patient->date = Utility::sanitize($_POST['date']);
$patient->room =  Utility::sanitize($_POST['room']);
$patient->bill =  Utility::sanitize($_POST['bill']);
$patient->status =  $status;
$patient->status_color =  $sta_color;

$result = $patient->updateStatus($patient);

if($result)
{
    $message = "Patient Status is updated successfully";
    set_session('message', $message);
    redirect('patient-list.php');
}



