<?php

namespace MedWeb;

use MedWeb\Config;

class Bed{
    public $cabin_no = null;
    public $type = null;
    public $status_image = null;

    private $Bedjson = null;

    public function __construct(){
        $this->Bedjson = json_decode(file_get_contents(Config::jsonData()."admin-bed-manage.json"));
    }

	public function list()
    {
        return $this->Bedjson;
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

    public function Bedstore($bed)
    {
        $this->Bedjson[]  = (object) $bed;
        return $this->BedjsonWrite();    
    }

    // public function edit($id=null)
    // {

    //    return $this->find($id);

    // }

    public function bedupdate($UpdatedBed)
    {
      
       foreach($this->Bedjson as $key=>$bedj)
       {
         if($bedj->cabin_no==$UpdatedBed->cabin_no)
         {
           break;
         }
       }

       $this->Bedjson[$key]  = (object) $UpdatedBed;
       
       return $this->BedjsonWrite();
    }



    // public function destroy($id=null) //completely delete
    // {
    //     if(empty($id)){
    //         return;
    //     }
        
    //     foreach($this->json as $key=>$patient){
    //         if($patient->id==$id) {
    //             break;  
    //        } 
        
    //     }
   
    //    array_splice($this->json,$key,1);
    
    //    return $this->jsonWrite();
    
    // }

    // public function trash()
    // {
        
    // }

    // public function delete() //soft delete
    // {
        
    // }


    private function BedjsonWrite(){
        $jsonfile = Config::jsonData()."admin-bed-manage.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->Bedjson));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }

    public function Bedfind($id=null)
    {
        if(empty($id) || is_null($id)){
            return false;
        }
        foreach($this->Bedjson as $key=>$patient){
            if($patient->cabin_no==$id) {
                break;
            }
        }
        return $patient;
        
    }

    
}