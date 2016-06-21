<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "function.php";

if (isset($_GET['id'])){
    $asset_id = $_GET['id'];
    $log = new FAssetClerk();
    
    $log->approve_asset($asset_id, 1);
    
}
