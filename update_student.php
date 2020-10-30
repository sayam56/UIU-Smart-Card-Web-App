<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}



  
$s_id=$_POST['s_id'];




try{
    $sqlquery="SELECT * FROM `student` WHERE s_id=$s_id";
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
            
          <h4>Student ID:</h4> <input class='inputbox' id='ss_id' type='text' value='$key[0]' disabled><br>
              <h4>RFID Tag:</h4> <input class='inputbox' id='ss_tag' type='text' value='$key[1]'><br>
              <h4>Student Name:</h4> <input class='inputbox' id='ss_name' type='text' value='$key[2]'><br>
              <h4>Email:</h4> <input class='inputbox' id='ss_email' type='text' value='$key[3]'><br>
              
              <h4>Department:</h4><input class='inputbox' id='ss_department' type='text' value='$key[5]'><br>
              <h4>Batch:</h4> <input class='inputbox' id='ss_batch' type='text' value='$key[6]'><br>
              <h4>Phone:</h4><input class='inputbox' id='ss_phone' type='text' value='$key[7]'><br>
              <h4>Running Trimester:</h4><input class='inputbox' id='srunning_trimester' type='text' value='$key[9]'><br>
              <button class='newModalbtn' onclick='updatedb_student()''>Update Student Info</button>
              <button class='newModalbtn' onclick='assign_student()''>Assign Section</button>
              
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

    



//     if(isset($_POST['update']))
//     {
//         
//         $s_id= $_POST['s_id'];
// $s_tag=$_POST['s_tag'];

// $s_name= $_POST['s_name'];
// $s_email= $_POST['s_email'];

// $s_department= $_POST['s_department'];
// $s_batch= $_POST['s_batch'];
// $s_phone= $_POST['s_phone'];
// $s_photo= $_POST['s_photo'];
// $running_trimester= $_POST['running_trimester'];

//         try{

//             $sqlquery="UPDATE 'student' SET s_tag=$s_tag,s_name=$s-name,s_email=$s_email,s_department=$s_department,s_batch=$s_batch,s_phone=$s_phone,running_trimester=$running_trimester WHERE s_id=$s_id";
//             $conn->exec($sqlquery);
//             




//         }
//         catch(PDOException $ex)
//         {
          
//         }

//     }

        
    



?>