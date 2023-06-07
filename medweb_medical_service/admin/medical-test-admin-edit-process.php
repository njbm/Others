<?php
require_once('../config.php');

use \MedWeb\utility\Utility;
use \MedWeb\MedicalTest;
$src = null;
$old_picture = null;
$new_picture = null;

$old_picture = $_POST['old_picture'];
if( array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name'])){
    $filename = $_FILES['picture']['name']; // if you want to keep the name as is
    $filename = uniqid()."_".$_FILES['picture']['name']; // if you want to keep the name as is
    $from = $_FILES['picture']['tmp_name'];
    $to = $uploads."test-images/".$filename;

    if(upload($from, $to)){
        $new_picture = $filename ;
    }

    if(file_exists($uploads."test-images/".$old_picture )){
        unlink( $uploads."test-images/".$old_picture );
    }
    
}

$test = new MedicalTest();
$test->id = Utility::sanitize($_POST['id']);
$test->title = Utility::sanitize($_POST['title']);      
$test->cost = Utility::sanitize($_POST['cost']) ;
$test->time = Utility::sanitize($_POST['time']);
$test->place = Utility::sanitize($_POST['place']);
$test->image = $new_picture ?? $old_picture;
$test->type = Utility::sanitize($_POST['type']);
$result = $test->update($test);

if($result)
{
    $message = "Service Card information is updated Successfully";
    set_session('message',$message);
    redirect('medical-test-admin.php');
}