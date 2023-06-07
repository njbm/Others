<?php

namespace MedWeb;

use MedWeb\Config;

class AmbulanceReq{
    public $id = null;
    public $patient_name = null;
    public $address = null;
    public $phone = null;
    public $message = null;
    public $status = null;
    public $status_color = null;


    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."admin-ambulence-req.json");
        $this->json = json_decode($fileData);
    }
    public function store($req)
    {

        $this->json[]  = (object) $req;
        return $this->jsonWrite();    
    }

    public function list()
    {
        return $this->json;   
    }


    public function updateStatus($req)
    {
      
       foreach($this->json as $key=>$request)
       {
         if($request->id==$req->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $req;
       
       return $this->jsonWrite();
    }

    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin-ambulence-req.json";
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
        foreach($this->json as $key=>$req){
            if($req->id==$id) {
                break;     
      }  
    } 
    
       array_splice($this->json,$key,1);
       return $this->jsonWrite();
    } 


}

