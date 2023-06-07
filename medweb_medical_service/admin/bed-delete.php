<?php

require_once("../config.php");
use MedWeb\BedAllot;
$bedAllot = new BedAllot();
$result = $bedAllot->destroy($_POST['id']);

    if($result)
    {
        redirect('bed_allotment_list.php');
    }

