<?php

namespace MedWeb;

use MedWeb\Config;

class News{
    public $id = null;
    public $name = null;
    public $src = null;
    public $alt = null;
    public $heading = null;
    public $paragraph = null;
    public $post_time = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."news-front.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }


    public function store($news)
    {
        $this->json[]  = (object) $news;
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

    public function update($news)
    {
      
       foreach($this->json as $key=>$anews)
       {
         if($anews->id==$news->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $news;
       
       return $this->jsonWrite();
    }



    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        foreach($this->json as $key=>$news){
            if($news->id==$id) {
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
        $jsonfile = Config::jsonData()."news-front.json";
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
        foreach($this->json as $key=>$news){
            if($news->id==$id) {
                break;
            }
        }
        return $news;
        
    }

    
}