<?php

require_once("../config.php");

use \MedWeb\MedicalTestAppointReq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

$test = new MedicalTestAppointReq();
$result = $test->destroy($id);
if($result)
{
    redirect('medical-test-appointment-list.php');
}