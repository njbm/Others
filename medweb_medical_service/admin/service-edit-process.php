<?php

require_once('../config.php');

use \MedWeb\utility\Utility;
use \MedWeb\Service;

$service = new Service();
$service->id = Utility::sanitize($_POST['id']); 
$service->name = Utility::sanitize($_POST['title']);      
$service->heading = Utility::sanitize($_POST['head']) ;
$service->paragraph = Utility::sanitize($_POST['content']);
$service->icon = Utility::sanitize($_POST['icon']);

$result = $service->update($service);

if($result)
{
    $message = "Service Card information is updated Successfully";
    set_session('message',$message);
    redirect('service-list.php');
}