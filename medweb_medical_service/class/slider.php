<?php

namespace MedWeb;

use MedWeb\Config;

class Slider{
    public $id = null;
    public $name = null;
    public $heading = null;
    public $paragraph = null;
    public $src = null;
    public $alt = null;

    private $json = null;

    public function __construct(){
        $fileData = file_get_contents(Config::jsonData()."slide.json");
        $this->json = json_decode($fileData);
    }

	public function list()
    {
        return $this->json;
    }

    public function create()
    {
        
    }

    public function store($slider)
    {
        $slider_data = $this->prepare($slider);
        $this->json[]  = (object) $slider_data;
        return $this->jsonWrite();
        
    }

    public function show($id)
    {
        return $this->find($id);
    }

    public function edit($id=null)
    {

       return $this->find($id);

    }

    public function update($slide)
    {
      
       foreach($this->json as $key=>$aslide)
       {
         if($aslide->id==$slide->id)
         {
           break;
         }
       }

       $this->json[$key]  = (object) $slide;
       
       return $this->jsonWrite();
    }



    public function destroy($id=null) //completely delete
    {
        if(empty($id)){
            return;
        }
        
        foreach($this->json as $key=>$slider){
            if($slider->id==$id) {
                break;
            
      } 
        
    } 
    /*
    option 1: Unset
     unset($arr_slider[$key]);
     $arr_slider = array_values($arr_slider); // this line only applicable if we don't use true during the json_decode
     $slide_json = json_encode($arr_slider);
    */

    /*
    option 2:
     array_splice($arr_slider,$key,1);
    */
   
       array_splice($this->json,$key,1);
    
       return $this->jsonWrite();
    
    }

    public function trash()
    {
        
    }

    public function delete() //soft delete
    {
        
    }

    private function prepare($slider)
    {
        $slider->id = uniqid();
        return $slider;
    }


    private function jsonWrite(){
        $jsonfile = Config::jsonData()."slide.json";
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