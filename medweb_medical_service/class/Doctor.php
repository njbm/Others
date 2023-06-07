<?php 
namespace MedWeb;

use MedWeb\Config;

class Doctor{
    
    public $id = null;
    public $name = null;
    public $image = null;
    public $specialist = null;
    public $email = null;
    public $Experiences_Summary = null;
    public $Practice_Days = null;
    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."admin_doctor_list.json");
        $this->json = json_decode($fileData);
    }
    public function store($doctor)
    {
        $result = false;

        $this->json[]  = (object) $doctor;
        return $this->jsonWrite();
        
    }

    public function all()
    {
        return $this->json;   
    }

    public function show($id)
    {
        return $this->find($id);
    }

    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($doctor)
    {
      
       foreach($this->json as $key=>$doc)
       {
         if($doc->id==$doctor->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $doctor;
       
       return $this->jsonWrite();
    }
    private function jsonWrite(){
        $jsonfile = Config::jsonData()."admin_doctor_list.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }
    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$doctor){
            if($doctor->id==$id) {
                break;     
      }  
    } 
    
       array_splice($this->json,$key,1);
       return $this->jsonWrite();
    } 

    public function find($id=null)
    {
        if(empty($id) || is_null($id)){
            return false;
        }
        foreach($this->json as $key=>$slide){
            if($slide->id==$id) {
                break;
            }
        }
        return $slide;
        
    }

    public function findAll()
    {
        
    }
}




?>