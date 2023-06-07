<?php

require_once("../config.php");
use \MedWeb\Appointment;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

 if(!Validator::empty($id)){
   $app = new Appointment();
   $result = $app->destroy($id);
   }else{
   dd("No preview found!"); //using session
   }
         
  if($result){
      redirect('appointment-list.php');
  }