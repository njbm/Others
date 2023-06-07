<?php
require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Doctor;

//sanitize



//validation




//image processing
$filename = $_FILES['picture']['name']; //if we use same file name
$filename = uniqid().'_'.$_FILES['picture']['name'];  //for unique file name
$from = $_FILES['picture']['tmp_name'];
$to = $uploads."/doctor-images"."/".$filename;
$src = null;
if(upload($from, $to)){
    $src = $filename;
}

$doctor = new Doctor;
$doctor->id =  uniqid();
$doctor->name =  Utility::sanitize($_POST['name']);      
$doctor->specialist =  Utility::sanitize($_POST['type']);
$doctor->Experiences_Summary =  Utility::sanitize($_POST['exp']);
$doctor->email =  Utility::sanitize($_POST['email']);
$doctor->image = $filename;
$doctor->Practice_Days =  Utility::sanitize($_POST['day']);
$result = $doctor->store($doctor);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once($short.'head.php'); ?>
    <title>Successful</title>
</head>

<body>

    <div class="card">
        <div class="card-body text-center">
            <i class="icon-check2 icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
            <h5 class="card-title">Successful</h5>
            <p class="mb-3">Doctor has been added Successfully.</p>
            <a href="doctor-profile-admin.php" class="btn bg-success-400">GO TO All Test</a>
        </div>
    </div>
</body>

</html>
<?php


?>