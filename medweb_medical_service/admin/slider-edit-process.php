<?php
require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Slider;


//image processing
$src = null;
$old_picture = null;
$new_picture = null;

$old_picture = $_POST['old_picture'];
//dd($old_picture);

if( array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name'])){
    $filename = $_FILES['picture']['name']; // if you want to keep the name as is
    $filename = uniqid()."_".$_FILES['picture']['name']; // if you want to keep the name as is
    $from = $_FILES['picture']['tmp_name'];
    $to = $uploads.$filename;

    if(upload($from, $to)){
        $new_picture = $filename ;
    }

    if(file_exists($uploads.$old_picture )){
        unlink( $uploads.$old_picture );
    }
    
}




//store: as json data to json file

$id = Utility::sanitize($_POST['id']);

$slider = new Slider();
$target_slide = $slider->find($id);
$target_slide->name = Utility::sanitize($_POST['title']);      
$target_slide->heading = Utility::sanitize($_POST['head']) ;
$target_slide->paragraph = Utility::sanitize($_POST['para']);
$target_slide->src = $new_picture ?? $old_picture;
$target_slide->alt = Utility::sanitize($_POST['alt']);


$result = $slider->update($target_slide);
//dd($slide);


if($result)
{
    $message = "Slider information is updated Successfully";
    //$_SESSION['message'] = $message;
    set_session('message', $message);
    redirect('slider-list.php');
}

?>




