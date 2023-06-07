<?php

require_once("../config.php");

//dd($_POST);


use \MedWeb\Patient;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

 if(!Validator::empty($id)){
   $patient = new Patient();
   $result = $patient->destroy($id);
   }else{
   dd("No preview found!"); //using session
   }
         
  if($result){
      redirect('patient-list.php');
  }