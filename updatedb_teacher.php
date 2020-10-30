<?php


        $t_id= $_POST['t_id'];
$t_tag=$_POST['t_tag'];

$t_name= $_POST['t_name'];
$t_email= $_POST['t_email'];

$t_department= $_POST['t_department'];

$t_phone= $_POST['t_phone'];

var_dump($t_id.$t_name.$t_phone.$t_tag);



try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="UPDATE teacher SET t_tag='$t_tag',t_name='$t_name',t_email='$t_email',t_department='$t_department',t_phone='$t_phone' WHERE t_id='$t_id'";
    $conn->exec($query);
    $query="UPDATE rfid SET r_tag='$t_tag'WHERE r_id='$t_id'";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>Teacher Updated</h1>
        
      
    </div>
  </div>";
    


}
catch(PDOException $e){
   
}








      

    
    ?>
