<?php
$t_id=$_POST['t_id'];



try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
   
   
}


 try{
    $query="DELETE FROM attendance WHERE t_id='$t_id'";
    $conn->exec($query);
    $query="DELETE FROM attendance_state WHERE t_id='$t_id'";
    $conn->exec($query);
    $query="DELETE FROM teacher WHERE t_id='$t_id'";
    $conn->exec($query);
    
    


 }
 catch(PDOException $e){
     echo "Query error";
   
 }













?>