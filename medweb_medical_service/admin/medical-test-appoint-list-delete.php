<?php

require_once("../config.php");



use \MedWeb\MedicalTestAppoint;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

$test = new MedicalTestAppoint();
$result = $test->destroy($id);
if($result)
{
    redirect('medicalTest-appoint-list.php');
}