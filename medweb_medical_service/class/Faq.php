<?php  
namespace MedWeb;
use MedWeb\Config;

class Faq {
    public $id = null;
    public $name = null;
    public $email = null;
    public $question = null;
    public $answer = null;
    public $date = null;
    private $faq_json = null;
    private $faq_req_json = null;
    public function __construct()  // Constructor Method
    {
        $this->faq_json = json_decode(file_get_contents(Config::jsonData()."faq.json"));
        $this->faq_req_json = json_decode(file_get_contents(Config::jsonData()."faq-req.json"));
    }
    public function list() // get all list
    {
        return $this->faq_json;
    }//
    public function req_list() // get all request list
    {
        return $this->faq_req_json;
    }
    public function store($faq) //Store Data
    {
        $this->faq_json[]  = (object) $faq;
        return $this->jsonWrite();
        
    }//
    public function req_store($faq) //Store Data
    {
        $this->faq_req_json[]  = (object) $faq;
        return $this->reqjsonWrite();
        
    }//
    public function edit($id=null) // Edit Faq
    {

       return $this->find($id);

    }
    public function update($faq) // Update Method
    {
      
       foreach($this->faq_json as $key=>$faqs)
       {
         if($faqs->id==$faq->id)
         {
           break;
         }
       }

       $this->faq_json[$key]  = (object) $faq;
       
       return $this->jsonWrite();
    }//
    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        
        foreach($this->faq_json as $key=>$faq){
            if($faq->id==$id) {
                break;
            
      } 
        
    } 

       array_splice($this->faq_json,$key,1);
    
       return $this->jsonWrite();
    }//

    public function destroyReq($id) //completely delete
    {
        if(empty($id)){
            return;
        }
        
        foreach($this->faq_req_json as $key=>$req){
            if($req->id==$id) {
                break;
            
      } 
        
    } 

       array_splice($this->faq_req_json,$key,1);
    
       return $this->reqjsonWrite();
    }//

    private function jsonWrite(){ // insert into json
        $jsonfile = Config::jsonData()."faq.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->faq_json));
            return true;
        }
        else{
          echo "Not Found!";
          return false;
        }
    }
    private function reqjsonWrite(){ // insert into json
        $jsonfile = Config::jsonData()."faq-req.json";
        if(file_exists($jsonfile)){
            $result = file_put_contents($jsonfile, json_encode($this->faq_req_json));
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
        foreach($this->faq_json as $key=>$faq){
            if($faq->id==$id) {
                break;
            }
        }
        return $faq;
        
    }
}



?>