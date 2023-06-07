<?php
require_once("../config.php");
use \MedWeb\utility\Utility;
use \MedWeb\Doctor;


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
    $to = $uploads.'doctor-images/'.$filename;

    if(upload($from, $to)){
        $new_picture = $filename ;
    }

    if(file_exists($uploads.'doctor-images/'.$old_picture )){
        unlink( $uploads.'doctor-images/'.$old_picture );
    }
    
}




//store: as json data to json file
$doctor = new Doctor;
$doctor->id =  Utility::sanitize($_POST['id']);
$doctor->name =  Utility::sanitize($_POST['name']);      
$doctor->specialist =  Utility::sanitize($_POST['type']);
$doctor->Experiences_Summary =  Utility::sanitize($_POST['exp']);
$doctor->email =  Utility::sanitize($_POST['email']);
$doctor->image = $new_picture ?? $old_picture;
$doctor->Practice_Days =  Utility::sanitize($_POST['day']);
$result = $doctor->update($doctor);





if($result)
{
    $message = "Doctor information is updated Successfully";
    //$_SESSION['message'] = $message;
    set_session('message', $message);
    redirect('doctor-profile-admin.php');
}
//$message = flush_session('message');
?>