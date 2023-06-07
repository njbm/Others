<?php

require_once("../config.php");

use \MedWeb\Faq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

$faq = new Faq();
$result = $faq->destroy($id);
if($result)
{
    redirect('faq-management.php');
}