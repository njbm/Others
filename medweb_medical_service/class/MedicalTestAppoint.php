<?php

namespace MedWeb;

use MedWeb\Config;

class MedicalTestAppoint{
    public $id = null;
    public $patient_name = null;
    public $test_name = null;
    public $gender = null;
    public $address = null;
    public $phone = null;
    public $date = null;


    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."medicalTest-appoint-list.json");
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

    public function edit($id)
    {

       return $this->find($id);

    }

    public function update($test)
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
        $jsonfile = Config::jsonData()."medicalTest-appoint-list.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }

    public function find($id)
    {
        if(empty($id) || is_null($id)){
            return false;
        }
        foreach($this->json as $key=>$test){
            if($test->id==$id) {
                break;
            }
        }
        return $test;
        
    }

    
}