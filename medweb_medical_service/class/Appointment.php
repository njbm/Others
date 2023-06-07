<?php

namespace MedWeb;

use MedWeb\Config;

class Appointment{
    public $id = null;
    public $patient_name = null;
    public $doctor_name= null;
    public $gender = null;
    public $address = null;
    public $phone = null;
    public $date = null;
    public $message = null;
    public $status = null;
    public $status_color = null;

    private $appointment_list = null;
    private $appointment_req = null;

    public function __construct(){
        $this->appointment_list = json_decode(file_get_contents(Config::jsonData()."admin-appointment-list.json"));
        $this->appointment_req = json_decode(file_get_contents(Config::jsonData()."admin-appointment-req.json"));
    }

	public function list()
    {
        return $this->appointment_list;
    }

    public function store($appoint)
    {
        $this->appointment_list[]  = (object) $appoint;
        return $this->jsonWrite();   
    }

    
    public function edit($id)
    {

       return $this->find($id);

    }

    public function update($appoint)
    {
      
       foreach($this->appointment_list as $key=>$an_appoint)
       {
         if($an_appoint->id==$appoint->id)
         {
           break;
         }
       }
   
       $this->appointment_list[$key]  = (object) $appoint;
       
       return $this->jsonWrite();
    }

    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin-appointment-list.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->appointment_list));
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
        foreach($this->appointment_list as $key=>$appoint){
            if($appoint->id==$id) {
                break;
            }
        }
        return $appoint;
        
    }

    

    public function destroy($id) //completely delete
    {
        if(empty($id)){
            return;
        }  
     foreach($this->appointment_list as $key=>$appoint){
            if($appoint->id==$id) {
                break;      
      } 
        
    } 
       array_splice($this->appointment_list,$key,1);
       return $this->jsonWrite();
    
    }


    

  /*  *****************************************************************
    ***************************************************************** */
    // appointment request 

    public function req_list() // get all request list
    {
        return $this->appointment_req;
    }

    public function storeReq($appoint)
    {
        $this->appointment_req[]  = (object) $appoint;
        return $this->jsonWriteReq();
    }

    public function destroyReq($id) //completely delete
    {
        if(empty($id)){
            return;
        }  
     foreach($this->appointment_req as $key=>$appoint){
            if($appoint->id==$id) {
                break;      
      } 
        
    } 
       array_splice($this->appointment_req,$key,1);
       return $this->jsonWriteReq();
    
    }

    public function updateStatus($appoint)
    {
      
       foreach($this->appointment_req as $key=>$an_appoint)
       {
         if($an_appoint->id==$appoint->id)
         {
           break;
         }
       }
   
       $this->appointment_req[$key]  = (object) $appoint;
       
       return $this->jsonWriteReq();
    }

    private function jsonWriteReq(){
        $jsonfile = Config::jsonData()."admin-appointment-req.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->appointment_req));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }

    








   


 

   

  
    
}