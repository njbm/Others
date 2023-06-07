<?php

require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\News;

$src = null;
$new_picture = null;
$old_picture = null;
$old_picture = $_POST['old_picture'];

if(array_key_exists('new_picture', $_FILES) && !empty($_FILES['new_picture']['name']))
{
    $filename = uniqid().'_'.$_FILES['new_picture']['name'];
    $from = $_FILES['new_picture']['tmp_name'];
    $to = $uploads.'news-images/'.$filename;
    if(upload($from, $to)){
        $new_picture = $filename;
    }
    if(file_exists($uploads.'news-images/'.$old_picture)){
        unlink($uploads.'news-images/'.$old_picture);
    }

}

$news = new News();
$news->id = Utility::sanitize($_POST['id']);     
$news->name = Utility::sanitize($_POST['title']);      
$news->src = $new_picture ?? $old_picture;
$news->alt = Utility::sanitize($_POST['alt']);
$news->heading = Utility::sanitize($_POST['head']) ;
$news->paragraph = Utility::sanitize($_POST['content']);
$news->post_time = Utility::sanitize($_POST['date']);


$result = $news->update($news);

if($result)
{
    $message = "News information is updated Successfully";
    set_session('message', $message);
    redirect('news-list-view.php');
}

?>
