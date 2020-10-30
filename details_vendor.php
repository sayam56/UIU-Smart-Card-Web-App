<?php
$vendor_id=$_POST['vendor_id'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    
}
$div="<div class='modal-content'>
<div id='animation'
          <div class='modal-body'>";
$divclose=" </div>   </div>
</div>";

$str="";

try{
    $sqlquery="SELECT v_reader ,vendor_id,vendor_name,vendor_email,vendor_phone,vendor_photo FROM vendor WHERE vendor_id='$vendor_id'";
    $pdostmt=$conn->query($sqlquery);
    if($pdostmt->rowCount()>0)
    {
      $table=$pdostmt->fetchAll();
      foreach($table as $key)
      {
          $str=$str." 
          <div class='detailss'>
            <img src='$key[5] ' alt='user.png'>            
            <h4>Vendor Reader: $key[0]</h4><br>
            <h4>Vendor ID: $key[1]</h4><br>
            <h4>Vendor Name: $key[2]</h4><br>
            <h4>Vendor Email: $key[3]</h4><br>
            <h4>Vendor Phone: $key[4]</h4><br> 
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