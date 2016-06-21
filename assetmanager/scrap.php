<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class scrap{
    public function add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $deprec=0.2, $division, $room ){
        
        $error = 0;
        
        //
        
        
        if ($error == 0){
            
            $que1 = "INSERT INTO asset(Asset_Name, Asset_Type, Item_Category, Model_No, Brand, Serial_No, Purchase_Date, Warranty_End, Price, Depreciation, Vendor, Vendor_Address, Asset_available, Current_Division, Current_Room) VALUES ('$item_name','$item_type', '$item_category', '$model', '$brand', '$serial_no', '$p_date', '$w_end',$value , $deprec, '$vendor','$vendor_add', 1 ,'$division', '$value'); ";
            try{
            //echo $que;
               $this->db->dbh->autocommit(FALSE);
               $this->db->dbh->beginTransaction();
               $res = $this->db->dbh->query($que) ;
               $this->db->dbh->commit();
               $this->db->dbh->autocommit(TRUE);
        
            }catch(Exception $e){
               $this->db->dbh->rollback();
            }
        } 
    }
    public function retrieve_assets(){
        
        $que = "SELECT * FROM asset";
        $this->db->dbh->autocommit(FALSE);
               $this->db->dbh->beginTransaction();
               $res = $this->db->dbh->query($que) ;
               $this->db->dbh->commit();
               $this->db->dbh->autocommit(TRUE);
        return $res;
    }
    
    public function retrieve_div_assets($div){
        $que = "SELECT * FROM asset where Current_division='$div'";
                $this->db->dbh->autocommit(FALSE);
               $this->db->dbh->beginTransaction();
               $res = $this->db->dbh->query($que) ;
               $this->db->dbh->commit();
               $this->db->dbh->autocommit(TRUE);
        return $res;
    }
    
    public function view_asset($asset_id){
        
        $que = "SELECT * FROM asset where Asset_ID = ?;";
        $stmt = $this->db->prepare($que);
        
        
        return $res;
    }
    
    public function update_asset($item_id,$item_name="", $item_type="", $item_category="",  $vendor="", $vendor_add="", $p_date="", $w_end="", $division="", $room="", $serial_no="", $deprec="", $value="", $model="", $brand=""){
        if (isset($item_id)){
            $count = 0;
            $cond = array();
            $values=array();
            
            if ($count > 0){
                $que = "UPDATE asset SET () WHERE Asset_ID='$item_id'";
                $this->db->dbh->autocommit(FALSE);
               $this->db->dbh->beginTransaction();
               $res = $this->db->dbh->query($que) ;
               $this->db->dbh->commit();
               $this->db->dbh->autocommit(TRUE);
                return $res;
            }
            else{
                return NULL;
            }
        }
    }
    
    
    public function remove_asset($asset_id){
        $que = "UPDATE asset SET (Asset_available=0) WHERE Asset_ID='$asset_id'";
        $res= $this->db->dbh->query($que);
        return $res;
    }
    
    public function approve_asset($asset_id){
        
        $this->db->dbh->autocommit(FALSE);
        $this->db->dbh->beginTransaction();
        $que1= "SELECT * FROM asset WHERE Asset_ID='$asset_id'";
        $que2 = "UPDATE asset SET () WHERE Asset_ID='$asset_id'";
        $res= $this->db->dbh->query($que);
        $array = $res->fetch_assoc();
        $approve = $array['Asset_approved'];
        if ($approve == 1){
            
        }
        else{
            
        }
        $this->db->dbh->commit();
        $this->db->dbh->autocommit(TRUE);
        
        
        $this->move_asset($asset_id);
    }
    
    public function move_asset($asset_id){
        $que = "Update asset_movement SET () Asset_ID='$asset_id'";
        
       
    }
    
    public function verify_asset($asset_id){
        $que = "UPDATE asset_movement SET() WHERE Asset_ID='$asset_id'";
    }
        
     
}
