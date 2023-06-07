<?php
require_once("../config.php");
use MedWeb\BedAllot;
$bedAllot = new BedAllot();

//dd($_POST);
// This block is for adding new bed allotment
// This portion is only for status change process 
if(isset($_POST["discharge"])){

//------------------------------------------------------------------------

$uid= $_POST['id']; 
$admin_bed_list_json =  file_get_contents($json."admin-bed-list.json");
$arr_admin_bed_list = json_decode($admin_bed_list_json, true);

    foreach($arr_admin_bed_list as $key=>$bed)
{

    if($bed["id"] == $uid)
    {
        break;
    }
}
$bed_allot = [
    "id" => $uid,
    "patient name" => $bed["patient name"],
    "address" => $bed["address"],
    "phone"  => $bed["phone"],
    "age"  => $bed["age"],
    "room" => $bed["room"],
    "date" => $bed["date"],
    "status" => "Discharged",
    "status color" => "badge-secondary"           
];
//-----------------------------------------------------------------

$bed_num = $bed["room"];
$bed_status_json =  file_get_contents($json."admin-bed-manage.json");
$arr_bed_status_list = json_decode($bed_status_json, true);

    foreach($arr_bed_status_list as $key=>$bedd)
{
    if($bedd["cabin no."] == $bed_num)
    {
        break;
    }
}
$bed_stat = [  
    "cabin no." => $bedd["cabin no."] ,
    "type" => $bedd["type"],
    "status image" => "gray.png"   
];

//dd($key);
$arr_bed_status_list[$key]  = $bed_stat;
//dd($arr_slider);
$bed_json = json_encode($arr_bed_status_list);
//dd($dataslide);
if(file_exists($json."admin-bed-manage.json")){
    $result = file_put_contents($json."admin-bed-manage.json", $bed_json);
    //echo $result;
  //give appropriate message
}
else{
    echo "Not Found!";
}

}// This portion is only for status change process 
else{
    $bedAllot->id = $_POST['id'];
    $bedAllot->patient_name = $_POST['name'];
    $bedAllot->age = $_POST['age'];
    $bedAllot->phone = $_POST['phone'];
    $bedAllot->date = $_POST['date'];
    $bedAllot->address = $_POST['add'];
    $bedAllot->room = $_POST['room'];
    $bedAllot->status = $_POST['status'];
    $bedAllot->status_color = $_POST['color'];
    

}
$result = $bedAllot->update($bedAllot);

if($result)
{
    $msg = "Bed Information is updated Successfully";
    set_session('message',$msg);
    redirect('bed_allotment_list.php');
}


?>