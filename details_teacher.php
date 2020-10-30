<?php
$t_id=$_POST['t_id'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}
$div="<div class='modal-content'>
<div id='animation'
          <div class='modal-body'>";
$divclose=" </div>   </div>
</div>";

$str="";


try{
    $sqlquery="SELECT * FROM `teacher` WHERE t_id='$t_id'";
    $pdostmt=$conn->query($sqlquery);
    if($pdostmt->rowCount()>0)
    {
      $table=$pdostmt->fetchAll();
      foreach($table as $key)
      {
          $str=" <div class='detailss'>
         
            
          <h4>Teacher ID: $key[0]</h4><br>
          <h4>RFID Tag: $key[1]</h4><br>
          <h4>Teacher Name: $key[2]</h4><br>
          <h4>Email : $key[3]</h4><br>
              
          <h4>Department:$key[5]</h4><br>
              
          <h4>Phone:$key[6]</h4><br>
              
              
            
          
        </div>             ";
      }
      echo $div.$str.$divclose;
    }
}

catch(PDOException $ex)
        {
          echo ("query error");
        }



?>