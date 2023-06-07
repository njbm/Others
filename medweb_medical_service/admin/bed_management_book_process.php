<?php
require_once("../config.php");
use MedWeb\Bed;
use MedWeb\BedAllot;
$bed = new Bed();
$bedAllot = new BedAllot();
//dd($_POST);
// This block is for adding new bed allotment
$bed_num = $_POST["room"];
$bed_color_data = $bed->Bedfind($bed_num);
$bed->cabin_no =  $bed_color_data->cabin_no;  
$bed->type =  $bed_color_data->type;  
$bed->status_image =  "green.png" ;  
$bed->bedupdate($bed);

//-----------------------------------------------------
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
            <p class="mb-3">Bed has been allocated Successfully.</p>
            <a href="bed_allotment_list.php" class="btn bg-success-400">GO TO LIST</a>
        </div>
    </div>

</body>

</html>



