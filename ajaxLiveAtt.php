
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
    if(isset($_GET['initiate'])) $initiate = $_GET['initiate'];
                    
    $section = str_replace("_"," ","$sec_name");
    $count2=1;

   try{
        $sqlquery=" INSERT INTO attendance_state (t_id,sec_name,date,state) VALUES ('$t_id','$section','$curdate','$initiate') ";
        $object=$conn->query($sqlquery);

         ?>
         <script>
           console.log('insertion successful');
         </script>

         <?php
            

          }
          catch(PDOException $e)
          {
              echo $e;
          }






          

        ?> 

 <label class="switch">
          <input type="checkbox" id="new" class="customCheckbox" checked>
          <span class="slider round"></span>
        </label>

        <div id="initTableBody" class="initTableBody">
          <h1 id="initText" style="color: green;">Attendance Sequence Initiated</h1>
        </div>