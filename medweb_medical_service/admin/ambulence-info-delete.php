<?php

require_once("../config.php");


use \MedWeb\Ambulance;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

 if(!Validator::empty($id)){
   $ambu = new Ambulance();
   $result = $ambu->destroy($id);
   }else{
   dd("No preview found!"); //using session
   }
         
  if($result){
      redirect('add-ambulence-admin.php');
  }