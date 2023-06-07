<?php

require_once("../config.php");
use \MedWeb\utility\Utility;
use \MedWeb\TestReport;

$file = null;
$new_pdf = null;
$old_pdf = null;

$old_pdf = $_POST['old_pdf'];

if(array_key_exists('new_pdf', $_FILES) && !empty($_FILES['new_pdf']['name']))
{
    $filename = uniqid().'_'.$_FILES['new_pdf']['name'];
    $from = $_FILES['new_pdf']['tmp_name'];
    $to = $uploads.'test-reports/'.$filename;
    if(upload($from, $to))
    {
        $new_pdf = $filename;
    }
    if(file_exists($uploads.'test-reports/'.$old_pdf))
    {
        unlink($uploads.'test-reports/'.$old_pdf);
    }

}


$file = $new_pdf ?? $old_pdf;


$report = new TestReport();
$report->id = Utility::sanitize($_POST['id']);  
$report->patient_name = Utility::sanitize($_POST['name']);      
$report->test_name = Utility::sanitize($_POST['test']);  
$report->address = Utility::sanitize($_POST['add']);
$report->phone = Utility::sanitize($_POST['phone']) ;
$report->date = Utility::sanitize($_POST['date']);
$report->report_file = $file;

$result = $report->update($report);

if($result)
{
    $message = 'Test Report Information is updated Successfully';
    set_session('message',$message);
    redirect('test-report-list.php');
}
