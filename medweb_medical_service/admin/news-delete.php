<?php

require_once("../config.php");

use \MedWeb\News;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;

  $id = Utility::sanitize($_POST['id']);
  $picture = Utility::sanitize($_POST['picture']);

   if(!Validator::empty($id)){
	 $news = new News();
	 $result = $news->destroy($id);
     }else{
	 dd("No preview found!"); //using session
     }
           
    if($result){
        if(file_exists($uploads.'news-images/'.$picture)){
            unlink($uploads.'news-images/'.$picture);
        }
        redirect('news-list-view.php');
    }