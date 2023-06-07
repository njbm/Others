<?php

require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Appointment;

$appoint = new Appointment();

$appoint->id = Utility::sanitize($_POST['id']);     
$appoint->patient_name =  Utility::sanitize($_POST['name']);      
$appoint->doctor_name =  Utility::sanitize($_POST['doc_name']);
$appoint->gender =  Utility::sanitize($_POST['gender']);
$appoint->address =  Utility::sanitize($_POST['add']);
$appoint->phone =  Utility::sanitize($_POST['phone']);
$appoint->date = Utility::sanitize($_POST['date']);

$result = $appoint->update($appoint);

if($result)
{
    $message = 'Appointment Information is upadated successfully';
    set_session('message', $message);
    redirect('appointment-list.php');
}