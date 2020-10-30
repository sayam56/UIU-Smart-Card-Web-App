<?php
$s_id= $_POST['s_id'];
$s_tag=$_POST['s_tag'];

$s_name= $_POST['s_name'];
$s_email= $_POST['s_email'];
$s_password= $_POST['s_password'];
$s_department= $_POST['s_department'];
$s_batch= $_POST['s_batch'];
$s_phone= $_POST['s_phone'];
$s_photo= $_POST['s_photo'];
$running_trimester= $_POST['running_trimester'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="INSERT INTO student VALUES('$s_id','$s_tag','$s_name','$s_email','$s_password','$s_department','$s_batch','$s_phone','$s_photo','$running_trimester')";
    $conn->exec($query);
    $query="INSERT INTO rfid VALUES('$s_tag','Student','$s_id')";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>New Student Added</h1>
        
      
    </div>
  </div>";
 
    


}
catch(PDOException $e){
   
}






?>