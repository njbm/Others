<?php

require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\MedicalTestAppointReq;


$status = $_POST['status'];
$sta_color = $_POST['color'];

if($status=='Pending' && $sta_color=='badge-secondary')
{
    $sta_color = 'badge-success';
    $status = 'Accepted';
}



$test = new MedicalTestAppointReq();
$test->id = Utility::sanitize($_POST['id']);    
$test->patient_name = Utility::sanitize($_POST['name']);     
$test->test_name = Utility::sanitize($_POST['test']);
$test->gender = Utility::sanitize($_POST['gender']);
$test->address = Utility::sanitize($_POST['add']);
$test->phone = Utility::sanitize($_POST['phone']);
$test->message = Utility::sanitize($_POST['message']);
$test->status = $status;
$test->status_color = $sta_color;
$result = $test->updateStatus($test);

if($result)
{
    $message = 'Medical Test Appointment Status is updated successfully';
    set_session('message',$message);
    redirect('medical-test-appointment-list.php');
}