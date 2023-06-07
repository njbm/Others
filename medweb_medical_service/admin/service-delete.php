<?php
require_once("../config.php");

use \MedWeb\Service;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

 if(!Validator::empty($id)){
   $service = new Service();
   $result = $service->destroy($id);
   }else{
   dd("No preview found!"); //using session
   }
         
  if($result){
      redirect('service-list.php');
  }