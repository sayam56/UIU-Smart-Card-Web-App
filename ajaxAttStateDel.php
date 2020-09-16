
<?php
	   /*DB connect*/
  try{
        $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
        echo "<script>console.log('connection successful');</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<script>window.alert('connection error');</script>";
    }


  date_default_timezone_set('Asia/Dhaka'); 
  $curdate = date("Y-m-d"); //contains current date in the given format

    
    if(isset($_GET['sec_name'])) $sec_name = $_GET['sec_name'];
  if(isset($_GET['t_id'])) $t_id = $_GET['t_id'];
  if(isset($_GET['date'])) $date = $_GET['date'];
                    
  $section = str_replace("_"," ","$sec_name");
                    		
                   		

try {
     $check="SELECT state FROM attendance_state WHERE t_id='$t_id' AND sec_name='$section' and date='$curdate' ORDER BY attStateID DESC LIMIT 1; ";
     $checkObj= $conn->query($check);
     $checkTable= $checkObj->fetchAll();
     foreach ($checkTable as $key) {

      if ($key[0] == 'false') {
        try {
          $del= "DELETE FROM attendance_state WHERE t_id='$t_id' and sec_name='$sec_name' and date='$curdate' ";
              $delObj= $conn->query($del);
              echo 'DELETED';

          
        } catch (PDOException $ex) {
          echo $ex;
        }
              

            }

     }
     
   } catch (PDOException $e) {
     echo $e;
   }
      


		?> 
