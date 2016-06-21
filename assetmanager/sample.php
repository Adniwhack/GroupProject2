<?php
require_once("conection.php");

//$Division_Code = $_POST['Division_Code'];
$itemname = $_POST['itemcategory_name'];
$Description = $_POST['itemcategory_Description'];

//mysql_select_db("asm",$conn);

$query="INSERT INTO `ams`.`itemcategory`(`itemname`, `itemdesc`)Values('{$itemname}', '{$Description}')";
$result=mysqli_query($conn,$query);

if(!$result){
    echo "Faild to insert";
}
else{
    echo "pass";
}

mysqli_close($conn);
?>
