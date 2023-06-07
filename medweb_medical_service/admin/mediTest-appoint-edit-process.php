<?php

require_once("../config.php");


use \MedWeb\utility\Utility;
use \MedWeb\MedicalTestAppoint;

$test = new MedicalTestAppoint();
$test->id = Utility::sanitize($_POST['id']); 
$test->patient_name = Utility::sanitize($_POST['name']);      
$test->test_name = Utility::sanitize($_POST['test']);
$test->gender = Utility::sanitize($_POST['gender']);
$test->address = Utility::sanitize($_POST['add']);
$test->phone = Utility::sanitize($_POST['phone']);
$test->date = Utility::sanitize($_POST['date']);
$result = $test->update($test);

if($result)
{
    $message = "Test Appointment information is updated Successfully";
    set_session('message', $message);
    redirect('medicalTest-appoint-list.php');
}