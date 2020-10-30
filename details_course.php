<?php
$c_code=$_POST['c_code'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    
}
$div="<div class='modal-content'>
<div class='modal-body'>";
$divclose="    </div>
</div>";

$str="";

try{
    $sqlquery="SELECT c.c_code, c.c_name,s.t_id,s.sec_name,s.sec_start_time,s.sec_end_time,s.sec_room_number FROM course AS c INNER JOIN section as s ON (c.c_code=s.c_code) WHERE c.c_code='$c_code'";
    $pdostmt=$conn->query($sqlquery);
    if($pdostmt->rowCount()>0)
    {
      $table=$pdostmt->fetchAll();
      foreach($table as $key)
      {
          $str=$str." 
          <div class='detailss'>
            
              <h4>Course Code: $key[0]</h4><br>
              <h4>Course Name: $key[1]</h4><br>
              <h4>Teacher ID: $key[2]</h4><br>
              <h4>Section Name: $key[3]</h4><br>
              <h4>Section Start Time: $key[4]</h4><br>
              <h4>Section End Time: $key[5]</h4><br>
              <h4>Section Room Number:$key[6]</h4><br>
              
              
            </div>
                   ";
      }
      echo $div.$str.$divclose;
    }
}

catch(PDOException $ex)
        {
          echo ("query error");
        }



?>