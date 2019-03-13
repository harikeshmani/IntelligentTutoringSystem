<?php

include("../config.php");
session_start();

if(isset($_POST["country_id"])){
    //Fetch all state data
  //  $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
     $sqll="SELECT * FROM states WHERE country_id = ".$_POST['country_id']." ";
     // echo $_POST['country_id'];
     // die;
    $username_dataa=mysqli_query($link, $sqll); 
    //Count total number of rows
    $username_countt = mysqli_num_rows($username_dataa);

    
    //State option list
    if($username_countt > 0){
        echo '<option value="">Select state</option>';
        while($userfetch_dataa=mysqli_fetch_array($username_dataa)){ 
            echo '<option value="'.$userfetch_dataa['id'].'">'.$userfetch_dataa['name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(isset($_POST["state_id"])){
    //Fetch all city data
   // $query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
     $sqlll="SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."  ";
    $username_dataaa=mysqli_query($link, $sqlll); 
    //Count total number of rows
    $username_counttt = mysqli_num_rows($username_dataaa);
 
    //Count total number of rows
   
    
    //City option list
    if($username_counttt > 0){
        echo '<option value="">Select city</option>';
        while($userfetch_dataaa=mysqli_fetch_array($username_dataaa)){ 
            echo '<option value="'.$userfetch_dataaa['id'].'">'.$userfetch_dataaa['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}


//error_reporting(0);






?>