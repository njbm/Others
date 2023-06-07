<?php

namespace MedWeb;

class Config{


    static public function jsonData()
    {
        return self::docroot().'/JsonData'.'/';
    }
   
    static public function docroot(){
        return $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
    }


}