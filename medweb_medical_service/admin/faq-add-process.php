<?php

require_once("../config.php");


use \MedWeb\Faq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$faq = new Faq();
$faq->id = uniqid();
$faq->question = Utility::sanitize($_POST['qus']);
$faq->answer = Utility::sanitize($_POST['ans']);
$faq->date = Utility::sanitize($_POST['date']);
$result = $faq->store($faq);



if($result)
{
    $message = "FAQ has been added successfully.";
    set_session('message',$message);
    redirect('faq-management.php');
}

