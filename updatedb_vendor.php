<?php


        $vendor_id= $_POST['vendor_id'];
$v_reader=$_POST['v_reader'];

$vendor_name= $_POST['vendor_name'];
$vendor_email= $_POST['vendor_email'];



$vendor_phone= $_POST['vendor_phone'];



try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="UPDATE vendor SET v_reader='$v_reader',vendor_name='$vendor_name',vendor_email='$vendor_email',vendor_phone='$vendor_phone' WHERE vendor_id='$vendor_id'";
    $conn->exec($query);
    $query="UPDATE rfid SET r_tag='$v_reader'WHERE r_id='$vendor_id'";
    $conn->exec($query);

    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>Vendor Updated</h1>
        
      
    </div>
  </div>";
    


}
catch(PDOException $e){
   
}








      

    
    ?>
