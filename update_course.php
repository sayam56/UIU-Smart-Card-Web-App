<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}



  
$c_code=$_POST['c_code'];




try{
    $sqlquery="SELECT * FROM `course` WHERE c_code='$c_code'";
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
            
              <h4>Course Code:</h4> <input class='inputbox' id='cc_id' type='text' value='$key[0]' disabled><br>
              <h4>Course Name:</h4> <input class='inputbox' id='cc_name' type='text' value='$key[1]' disabled><br>
              <h4>Teacher ID:</h4> <input class='inputbox' id='cct_id' type='text'><br>
              <h4>Section Name:</h4> <input class='inputbox' id='ccsec_name' type='text'><br>
              <h4>Section Start Time:</h4> <input class='inputbox' id='cc_start' type='time'><br>
              <h4>Section End Time:</h4> <input class='inputbox' id='cc_end' type='time'><br>
              <h4>Section Room Number:</h4> <input class='inputbox' id='cc_room' type='text'><br>
              <h4>Section Room Reader Tag:</h4> <input class='inputbox' id='cc_tag' type='text'><br>
              <h4>Section Trimester:</h4> <input class='inputbox' id='cc_trim' type='text'><br>
             
            
            <button class='newModalbtn' onclick='assign_section_course()''>Add Section</button>
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