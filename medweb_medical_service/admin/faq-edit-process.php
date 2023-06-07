<?php

require_once("../config.php");

use \MedWeb\Faq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$faqs = new Faq();
$faq = $faqs->find($_POST['id']);
$faq->id = Utility::sanitize($_POST['id']);
$faq->question = Utility::sanitize($_POST['qus']);
$faq->answer = Utility::sanitize($_POST['ans']);
$faq->date = Utility::sanitize($_POST['date']);
$result = $faqs->update($faq);

if($result)
{
    $message = 'FAQ Information is updated successfully';
    set_session('message',$message);
    redirect('faq-management.php');
}