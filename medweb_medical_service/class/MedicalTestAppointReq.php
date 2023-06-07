<?php

namespace MedWeb;

use MedWeb\Config;

class MedicalTestAppointReq{
    public $id = null;
    public $patient_name = null;
    public $test_name = null;
    public $gender = null;
    public $address = null;
    public $phone = null;
    public $message = null;
    public $status = null;
    public $status_color = null;



    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."medical-test-appoint.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }



    public function store($test)
    {
        $this->json[]  = (object) $test;
        return $this->jsonWrite();
        
    }


    public function updateStatus($test)
    {
      
       foreach($this->json as $key=>$atest)
       {
         if($atest->id==$test->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $test;
       
       return $this->jsonWrite();
    }



    public function destroy($id) //completely delete
    {
        if(empty($id)){
            return;
        }
        
        foreach($this->json as $key=>$test){
            if($test->id==$id) {
                break;
            
      } 
        
    } 
       array_splice($this->json,$key,1);
    
       return $this->jsonWrite();
    
    }


    private function jsonWrite(){
        $jsonfile = Config::jsonData()."medical-test-appoint.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }

    
}