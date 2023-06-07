<?php

namespace MedWeb;

use MedWeb\Config;

class Contact{
    public $id = null;
    public $name = null;
    public $email = null;
    public $phone = null;
    public $message = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."contact-message.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }


    public function store($contact)
    {
        $this->json[]  = (object) $contact;
        return $this->jsonWrite();
        
    }


    public function destroy($id) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$contact){
            if($contact->id==$id) {
                break;         
      } 
        
    } 
       array_splice($this->json,$key,1);
       return $this->jsonWrite();
    
    }

    private function jsonWrite(){
        $jsonfile = Config::jsonData()."contact-message.json";
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