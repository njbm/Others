<?php

require_once("../config.php");

use \MedWeb\AmbulanceReq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

 if(!Validator::empty($id)){
   $req = new AmbulanceReq();
   $result = $req->destroy($id);
   }else{
   dd("No preview found!"); //using session
   }
         
  if($result){
      redirect('ambulence-req-check.php');
  }