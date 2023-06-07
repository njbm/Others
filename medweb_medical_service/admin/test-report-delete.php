<?php

require_once("../config.php");
use \MedWeb\TestReport;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;

  $id = Utility::sanitize($_POST['id']);
  $reportFile = Utility::sanitize($_POST['test_report']);

   if(!Validator::empty($id)){
	 $report = new TestReport();
	 $result = $report->destroy($id);
     }else{
	 dd("No preview found!"); //using session
     }
           
    if($result){
        if(file_exists($uploads.'test-reports/'.$reportFile)){
            unlink($uploads.'test-reports/'.$reportFile);
        }
        redirect('test-report-list.php');
    }