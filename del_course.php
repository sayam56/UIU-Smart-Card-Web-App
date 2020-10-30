<?php
$c_code=$_POST['c_code'];
var_dump($c_code);



try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
   
   
}


 try{
    $query="DELETE FROM course WHERE c_code='$c_code'";
    $conn->exec($query);
    
    


 }
 catch(PDOException $e){
     echo "Query error";
   
 }













?>