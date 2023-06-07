<?php

require_once("../config.php");

use \MedWeb\Doctor;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

$picture = Utility::sanitize($_POST['picture']);

if (!Validator::empty($id)) {
    $doctor = new Doctor();
    $result = $doctor->destroy($id);
} else {
    dd("No preview found!"); //using session
}
if ($result) {
    if (file_exists($uploads . 'doctor-images/' . $picture)) {
        unlink($uploads . 'doctor-images/' . $picture);
    }
    redirect('doctor-profile-admin.php');
}
