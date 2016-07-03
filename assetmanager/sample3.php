<?php
require_once("conection.php");

//$Division_Code = $_POST['Division_Code'];
$division = $_POST['division'];
$roomcode = $_POST['room_code'];
$roomname = $_POST['room_name'];
$roomdesc = $_POST['room_description'];
$query="INSERT INTO `ams`.`room`(`Room_code`, `Room_name`, `Division`, `Description`)Values('{$roomcode}', '{$roomname}','{$division}', '{$roomdesc}')";
$result=mysqli_query($conn,$query);

if(!$result){
    echo "Faild to insert";
}
else{
    echo "pass";
}

mysqli_close($conn);
?>