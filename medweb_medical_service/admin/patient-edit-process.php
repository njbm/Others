<?php
require_once("../config.php");
use \MedWeb\utility\Utility;
use \MedWeb\Patient;

// store the data from user to json

$patient = new Patient();

$patient->id =  Utility::sanitize($_POST['id']);
$patient->patient_name =  Utility::sanitize($_POST['name']);      
$patient->age =  Utility::sanitize($_POST['age']);
$patient->address =  Utility::sanitize($_POST['add']);
$patient->phone =  Utility::sanitize($_POST['phone']);
$patient->date = Utility::sanitize($_POST['date']);
$patient->room =  Utility::sanitize($_POST['room']);
$patient->bill =  Utility::sanitize($_POST['bill']).'/-';
$patient->status =  Utility::sanitize($_POST['status']);
$patient->status_color =  Utility::sanitize($_POST['color']);

$result = $patient->update($patient);

if($result)
{
    $message = "Patient Information is updated successfully";
    set_session('message', $message);
    redirect('patient-list.php');
}


