<?php
$vendor_id=$_POST['vendor_id'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $qr="DELETE FROM item_list WHERE vendor_id='$vendor_id'";
    $conn->exec($qr);
    $query="DELETE FROM vendor WHERE vendor_id='$vendor_id'";
    $conn->exec($query);
    


}
catch(PDOException $e){
    echo "Query Error";
   
}






?>