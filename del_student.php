<?php
$s_id=$_POST['s_id'];
var_dump($s_id);

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $qr="DELETE FROM attendance WHERE s_id='$s_id'";
    $conn->exec($qr);
    $query="DELETE FROM student WHERE s_id='$s_id'";
    $conn->exec($query);
    


}
catch(PDOException $e){
    echo "Query Error";
   
}






?>