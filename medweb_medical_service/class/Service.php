<?php

namespace MedWeb;

use MedWeb\Config;

class Service{
    public $id = null;
    public $name = null;
    public $heading = null;
    public $paragraph = null;
    public $icon = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."service-front.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }


    public function store($service)
    {
        $this->json[]  = (object) $service;
        return $this->jsonWrite();
        
    }

    public function edit($id=null)
    {

       return $this->find($id);

    }

    public function update($service)
    {
      
       foreach($this->json as $key=>$aservice)
       {
         if($aservice->id==$service->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $service;
       
       return $this->jsonWrite();
    }



    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$service){
            if($service->id==$id) {
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
        $jsonfile = Config::jsonData()."service-front.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }

    public function find($id=null)
    {
        if(empty($id) || is_null($id)){
            return false;
        }
        foreach($this->json as $key=>$service){
            if($service->id==$id) {
                break;
            }
        }
        return $service;
        
    }

    
}