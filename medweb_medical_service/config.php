<?php

session_start();
ini_set('display_error','On');
error_reporting(E_ALL);

include_once($_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service/vendor/autoload.php');

function d($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
function dd($var){
   d($var);
   die();
}

function set_session($key, $val){

 $_SESSION[$key] = $val;
}

function get_session($key)
{
    if(array_key_exists($key, $_SESSION) && !empty($_SESSION[$key])){
        return $_SESSION[$key];
    }
    return null;
}

function flush_session($key){
    $value = get_session($key);
    $_SESSION[$key]='';
    return $value; 
}

function kill_session(){
    session_destroy();
    $_SESSION = null;
    unset($_SESSION);
}


function redirect($url){
    header("location: $url");
}

function upload($from, $to)
{
    move_uploaded_file($from, $to);
    return true;
}
/*
d($_SERVER['DOCUMENT_ROOT']);
*/
$doc_root = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
$short = $doc_root.'/short'.'/';
$json = $doc_root.'/JsonData'.'/';
$uploads = $doc_root.'/images'.'/';
$images2 = 	'http://localhost/medweb_medical_service/images/';
$http = 	'http://localhost/medweb_medical_service/';


//$head = $short.'/head.php';