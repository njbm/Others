<?php

namespace MedWeb;

use MedWeb\Config;

class TestReport{
    public $id = null;
    public $patient_name = null;
    public $test_name = null;
    public $address = null;
    public $phone = null;
    public $date = null;
    public $report_file = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."admin-test-report.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }


    public function store($report)
    {
        $this->json[]  = (object) $report;
        return $this->jsonWrite();
        
    }

    public function show($id)
    {

       return $this->find($id);

    }

    public function edit($id)
    {

       return $this->find($id);

    }

    public function update($report)
    {
      
       foreach($this->json as $key=>$areport)
       {
         if($areport->id==$report->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $report;
       
       return $this->jsonWrite();
    }



    public function destroy($id) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$report){
            if($report->id==$id) {
                break;         
      } 
        
    } 
       array_splice($this->json,$key,1);
       return $this->jsonWrite();
    
    }

    public function trash()
    {
        
    }

    public function delete() //soft delete
    {
        
    }



    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin-test-report.json";
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
        foreach($this->json as $key=>$report){
            if($report->id==$id) {
                break;
            }
        }
        return $report;
        
    }

    
}