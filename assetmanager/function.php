<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "server_access.php";
session_start();


class dbAsset{
    
    function __construct(){}
    
    public function create(){}
    
}


class FAssetClerk{
    private $db = NULL;
    function __construct(){
        $this->db = dbConnect::connect();
    }
    
    /**This is function for adding assets.  */
    
    function add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec = 0.2){
        $que1 = "INSERT INTO asset(Asset_Name, Asset_type, Asset_Category, Model_No, Brand, Serial_No, Purchase_Date, Warranty_End, Price, Depreciation, Vendor, Vendor_Address,  Current_Division, Current_Room,Barcode_No) "
                . "VALUES ('$item_name','$item_type', '$item_category', '$model', '$brand', '$serial_no', '$p_date', '$w_end',$value , $deprec, '$vendor','$vendor_add', '$division','$room' '$barcode_no'); ";
        //try{
            echo "$que1";
            $res = $this->db->dbh->query($que1);
            
            return $res;
        //}
        //catch(Exception $e){
            //$this->db->dbh->rollback();
            
            
        //}

    }

    function approve_asset($asset_id, $approve){
        $que1 = "SELECT * FROM asset WHERE Asset_ID='$asset_id'";
        $que2 = "UPDATE asset SET Asset_approved=$approve WHERE Asset_ID='$asset_id'";

        $res1= $this->db->dbh->query($que1);
        $res2 = $this->db->dbh->query($que2);

        $array = $res->fetch_assoc();
        $division= $arr['Current_division'];

        $que3 = "INSERT INTO asset_movement () VALUES ()";


    }


    function verify_asset($asset_id, $verify){
        $que = "UPDATE asset_movement SET Asset_approved=1 WHERE asset_id='$asset_id' AND approve=0";
        $que1 = "SELECT * FROM asset WHERE Asset_ID='$asset_id'";


    }

    function retrieve_assets($div="", $valid="yes", $removed="no"){
        $append = array();
        if ($div!= ""){
            array_push($append, "Current_Division = '$div'");
            
        }
        if ($valid=="yes"){
            array_push($append, "Asset_approved = 1");
            
            
        }
        else{
            array_push($append, "Asset_approved = 0");
        }

        if ($removed=="yes"){
            array_push($append, "Asset_available = 0");
            
        }
        
        $appix = implode(' AND ', $append);
        
        $que="SELECT * FROM asset WHERE ".$appix ;
        
        $res = $this->db->dbh->query($que);

        return $res;


    }

    function view_asset($asset_id){

        return $this->db->dbh->query("SELECT * FROM asset WHERE Asset_ID='$asset_id'");
    }

    function move_asset($asset_id, $division, $room){

       $que1 = "SELECT * FROM asset WHERE Asset_ID='$asset_id'";
       $res = NULL;
       $resx = $this->db->dbh->query($que);

       if ($res->num_rows() == 1){
           $array = $res->fetch_assoc();
           $cur_division = $array['Current_division'];
           $cur_room = $array['Current_room'];
           $que2 = "INSERT INTO asset_movement (asset_id, old_division, old_room, new_division, new_room, move_date) VALUES ('$asset_id', $cur_division, $cur_room, $division, $room, ".  date('Y-m-d' ).")";
           try{
                $res = $this->db->dbh->query($que2);
           }
           catch(Exception $e){
                //$this->db->dbh->rollback();
           }
       }

    }

    function update_asset($asset_id, $item_name="", $item_type="", $item_category="",  $vendor="", $vendor_add="", $p_date="", $w_end="", $serial_no="", $deprec="", $value="", $model="", $brand=""){
        $cond = array();

        if ($item_name!=''){array_push($cond, "Asset_Name='$item_name'");}
        if ($item_type != ""){array_push($cond, "Asset_type='$item_type'");}
        if ($item_category != ""){array_push($cond, "Asset_Category='$item_category'");}
        if ($vendor!= ""){array_push($cond, "Vendor='$vendor'");}
        if ($vendor_add != "" ){array_push($cond, "Vendor_Address='$vendor_add'");}
        if ($p_date != ""){array_push($cond, "Purchase_Date='$p_date'");}
        if ($w_end != ""){array_push($cond, "Warranty_End='$w_end'");}
        if ($serial_no != ""){array_push($cond, "Serial_No='$serial_no'");}
        if ($deprec != ""){array_push($cond, "Depreciation='$depreciation'");}
        if ($value != ""){array_push($cond, "Price='$value'");}
        if ($model != ""){array_push($cond, "Model_No='$model'");}
        if ($brand != ""){array_push($cond, "Brand='$brand'");}

        if (count($cond >= 1)){
            $que = "UPDATE asset SET ".implode(" , ", $cond)." WHERE Asset_ID='$asset_id'";
            $res = $this->db->dbh->query($que);
        }
        else{}

    }

    function edit_barcode($asset_id, $barcode){
        $que = "UPDATE asset SET Barcode_No=$barcode WHERE Asset_ID='$$asset_id'";
        $res = $this->db->dbh->query($que);
    }





    function add_asset_description($asset_id, $description){
        $que = 'UPDATE asset SET Description="'.$description.'" WHERE Asset_ID="'.$asset_id.'"';
        $res = $this->db->dbh->query($que);

    }

    function remove_asset($asset_id){
        $que = "UPDATE asset SET Asset_available=0 WHERE Asset_ID='$asset_id'";
        $res = $this->db->dbh->query($que);
    }


}



