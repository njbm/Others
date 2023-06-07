<?php

require_once("../config.php");

use \MedWeb\Faq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$faq = new Faq();
$faq->id = uniqid();
$faq->name = Utility::sanitize($_POST['name']);
$faq->email = Utility::sanitize($_POST['email']);
$faq->question = Utility::sanitize($_POST['qus']);
$result = $faq->req_store($faq);


if($result)
{
    $message = "Your Question has been sent successfully.";
    set_session('message',$message);
    redirect('user-faq.php');
}

