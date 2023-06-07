<?php
namespace MedWeb;

use MedWeb\Config;

require_once('Bed.php');

class BedAllot{
    public $id = null;
    public $patient_name = null;
    public $phone = null;
    public $address = null;
    public $age = null;
    public $room = null;
    public $date = null;
    public $status = null;
    public $status_color = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."admin-bed-list.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }

    // public function updateStatus($patient) // status update
    // {
    //     foreach($this->json as $key=>$apatient)
    //    {
    //      if($apatient->id==$patient->id)
    //      {
    //        break;
    //      }
    //    }
    //     $this->json[$key] = (object) $patient;
    //     return $this->jsonWrite(); 
    // }

    public function store($BedAllot)
    {
        $this->json[]  = (object) $BedAllot;
        return $this->jsonWrite();    
    }

    // public function edit($id=null)
    // {

    //    return $this->find($id);

    // }

    public function update($bed)
    {
      
       foreach($this->json as $key=>$apatient)
       {
         if($apatient->id==$bed->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $bed;
       
       return $this->jsonWrite();
    }



    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        
        foreach($this->json as $key=>$bed){
            if($bed->id==$id) {
                break;  
           } 
        
        }
   
       array_splice($this->json,$key,1);
    
       return $this->jsonWrite();
    
    }

    // public function trash()
    // {
        
    // }

    // public function delete() //soft delete
    // {
        
    // }


    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin-bed-list.json";
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
        foreach($this->json as $key=>$bed){
            if($bed->id==$id) {
                break;
            }
        }
        return $bed;
        
    }

    
}