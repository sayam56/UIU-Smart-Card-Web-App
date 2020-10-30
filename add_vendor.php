<?php
$v_reader= $_POST['v_reader'];
$vendor_name=$_POST['vendor_name'];

$vendor_uid= $_POST['vendor_uid'];
$vendor_email= $_POST['vendor_email'];
$vendor_password= $_POST['vendor_password'];
$vendor_phone= $_POST['vendor_phone'];

$vendor_photo= $_POST['vendor_photo'];
var_dump($vendor_name);


try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="INSERT INTO vendor VALUES('$v_reader','','$vendor_name','$vendor_uid','$vendor_password','$vendor_email','$vendor_phone','$vendor_photo')";
    $conn->exec($query);
    $qr="SELECT vendor_id FROM vendor WHERE vendor_name='$vendor_name'";
    
    $pdostmt=$conn->query($qr);
    $table=$pdostmt->fetchAll();
    
    foreach($table as $key)
    {
        
        
       $query="INSERT INTO rfid VALUES('$v_reader','Vendor','$key[0]')";
     $conn->exec($query);

    }
  
    
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>New Vendor Added</h1>
        
      
    </div>
  </div>";
 
    


}
catch(PDOException $e){
   
}






?>