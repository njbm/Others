<?php

require_once("../config.php");
use \MedWeb\MedicalTest;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;
  $id = Utility::sanitize($_POST['id']);
  $picture = Utility::sanitize($_POST['picture']);

   if(!Validator::empty($id)){
	 $test = new MedicalTest();
	 $result = $test->destroy($id);
     }else{
	 dd("No preview found!"); //using session
     }
           
    if($result){
        if(file_exists($uploads.'test-images/'.$picture)){
            unlink($uploads.'test-images/'.$picture);
        }
        redirect('medical-test-admin.php');
    }