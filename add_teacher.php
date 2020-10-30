<?php
$t_id= $_POST['t_id'];
$t_tag=$_POST['t_tag'];

$t_name= $_POST['t_name'];
$t_email= $_POST['t_email'];
$t_password= $_POST['t_password'];
$t_department= $_POST['t_department'];

$t_phone= $_POST['t_phone'];
$t_photo= $_POST['t_photo'];


try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="INSERT INTO teacher VALUES('$t_id','$t_tag','$t_name','$t_email','$t_password','$t_department','$t_phone','$t_photo')";
    $conn->exec($query);
    $query="INSERT INTO rfid VALUES('$t_tag','Teacher','$t_id')";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>New Teacher Added</h1>
        
      
    </div>
  </div>";
    
    


}
catch(PDOException $e){
   
}






?>