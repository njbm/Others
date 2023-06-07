<?php

require_once("../config.php");
use \MedWeb\utility\Utility;
use \MedWeb\Ambulance;


$ambu = new Ambulance();

$ambu->id = Utility::sanitize($_POST['id']); 
$ambu->ambulence_no =  Utility::sanitize($_POST['number']);      
$ambu->driver_name =  Utility::sanitize($_POST['name']);
$ambu->location =  Utility::sanitize($_POST['location']);
$ambu->phone =  Utility::sanitize($_POST['phone']);
$ambu->status =  Utility::sanitize($_POST['status']);
$ambu->status_color = Utility::sanitize($_POST['color']);
$result = $ambu->update($ambu);
if($result)
{
    $message = 'Ambulence Information is updated successfully';
    set_session('message',$message);
    redirect('add-ambulence-admin.php');
}