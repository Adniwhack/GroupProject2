<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "function.php";


$log = new FAssetClerk();

if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    foreach ($_POST['assets'] as $asset) {
        $log->remove_asset($asset);
        
    }
}
header("Location:viewasset.php");