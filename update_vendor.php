<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}



  
$vendor_id=$_POST['vendor_id'];




try{
    $sqlquery="SELECT * FROM `vendor` WHERE vendor_id=$vendor_id";
    $pdostmt=$conn->query($sqlquery);
    if($pdostmt->rowCount()>0)
    {
      $table=$pdostmt->fetchAll();
      foreach($table as $key)
      {
          $str=" <div class='modal-content'>
          <div id='animation'>
          <div class='modal-body'>
          <div class='detailss'>
            
          <h4>Vendor ID:</h4> <input class='inputbox' id='vv_id' type='text' value='$key[1]' disabled><br>
              <h4>RFID Tag:</h4> <input class='inputbox' id='vv_tag' type='text' value='$key[0]'><br>
              <h4>Vendor Name:</h4> <input class='inputbox' id='vv_name' type='text' value='$key[2]'><br>
              <h4>Email:</h4> <input class='inputbox' id='vv_email' type='text' value='$key[5]'><br>
             
              <h4>Phone:</h4><input class='inputbox' id='vv_phone' type='text' value='$key[6]'><br>
             
              <button class='newModalbtn' onclick='updatedb_vendor()''>Update Vendor Info</button>
             
              
              </div>
              </div>
          </div>
        </div>             ";
      }
      echo $str;
    }
}

catch(PDOException $ex)
        {
          echo ("query error");
        }

    


    



?>