<?php

require_once("../config.php");
use \MedWeb\Contact;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;
  $id = Utility::sanitize($_POST['id']);

   if(!Validator::empty($id)){
	 $contact = new Contact();
	 $result = $contact->destroy($id);
     }else{
	 dd("No preview found!"); //using session
     }
           
    if($result){
        redirect('contact-list.php');
    }