<?php

require_once("../config.php");



use \MedWeb\Faq;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

$faqreq = new Faq();
$result = $faqreq->destroyReq($id);
if($result)
{
    redirect('faq-request-list.php');
}