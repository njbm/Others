<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');



  use \MedWeb\Slider;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;

  $id = Utility::sanitize($_POST['id']);
  $picture = Utility::sanitize($_POST['src']);

   if(!Validator::empty($id)){
	 $slider = new Slider();
	 $result = $slider->destroy($id);
     }else{
	 dd("No preview found!"); //using session
     }
           
    if($result){
        if(file_exists($uploads.$picture)){
            unlink($uploads.$picture);
        }
        redirect('slider-list.php');
    }
  
                
?>            