<?php


        $s_id= $_POST['s_id'];
$s_tag=$_POST['s_tag'];

$s_name= $_POST['s_name'];
$s_email= $_POST['s_email'];

$s_department= $_POST['s_department'];
$s_batch= $_POST['s_batch'];
$s_phone= $_POST['s_phone'];

$running_trimester= $_POST['running_trimester'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="UPDATE student SET s_tag='$s_tag',s_name='$s_name',s_email='$s_email',s_department='$s_department',s_batch='$s_batch',s_phone='$s_phone',running_trimester='$running_trimester' WHERE s_id=$s_id";
    $conn->exec($query);
    $query="UPDATE rfid SET r_tag='$s_tag'WHERE r_id='$s_id'";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>Student Updated</h1>
        
      
    </div>
  </div>";
    


}
catch(PDOException $e){
   
}








      

    
    ?>
