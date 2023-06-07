<?php

namespace MedWeb;

use MedWeb\Config;

class Ambulance{
    public $id = null;
    public $ambulence_no = null;
    public $driver_name = null;
    public $location = null;
    public $phone = null;
    public $status = null;
    public $status_color = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."admin-ambulence-info.json");
        $this->json = json_decode($fileData);
    }
    public function store($ambu)
    {

        $this->json[]  = (object) $ambu;
        return $this->jsonWrite();    
    }

    public function list()
    {
        return $this->json;   
    }


    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($ambu)
    {
      
       foreach($this->json as $key=>$ambulance)
       {
         if($ambulance->id==$ambu->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $ambu;
       
       return $this->jsonWrite();
    }

    public function updateStatus($ambu)
    {
      
       foreach($this->json as $key=>$ambulance)
       {
         if($ambulance->id==$ambu->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $ambu;
       
       return $this->jsonWrite();
    }

    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin-ambulence-info.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }
    public function destroy($id) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$ambu){
            if($ambu->id==$id) {
                break;     
      }  
    } 
    
       array_splice($this->json,$key,1);
       return $this->jsonWrite();
    } 

    public function find($id)
    {
        if(empty($id) || is_null($id)){
            return false;
        }
        foreach($this->json as $key=>$ambu){
            if($ambu->id==$id) {
                break;
            }
        }
        return $ambu;
        
    }

}

