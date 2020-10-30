<?php
$c_code= $_POST['c_code'];
$c_name=$_POST['c_name'];

$t_id= $_POST['t_id'];
$sec_name= $_POST['sec_name'];
$sec_start_time= $_POST['sec_start_time'].":00";
$sec_end_time= $_POST['sec_end_time'].":00";
$sec_room_number= $_POST['sec_room_number'];
$sec_rfid_reader= $_POST['sec_rfid_reader'];
$sec_trimester= $_POST['sec_trimester'];

$sectionTime=date('H:i',strtotime('+90 minutes +0 seconds',strtotime($sec_start_time))); 
$sectionTime=$sectionTime.":00";




try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}
try{
   // SELECT * FROM section WHERE sec_start_time>= '08:00:00' AND sec_start_time<='10:30:00' AND sec_room_number='410'
    $qr="SELECT count(*) FROM section WHERE sec_start_time>='$sec_start_time' AND sec_start_time<='$sectionTime' AND sec_room_number='$sec_room_number'";
    $pdostmt=$conn->query($qr);
    
    if($pdostmt->rowCount()>0)
    {
        $table=$pdostmt->fetchAll();
        foreach($table as $key)
        {
            if($key[0]==0)
            {
                $query="INSERT INTO section VALUES('$c_code','$t_id','$sec_name','$sec_start_time','$sec_end_time','$sec_room_number','$sec_rfid_reader','$sec_trimester')";
                $conn->exec($query);
                echo "<div class='modal-content'>
                <div class='modal-body'>
                  
                   <h1>New Section Added</h1>
                    
                  
                </div>
              </div>";
                
               
                
              
                
            }
            else{
                echo "section timing clash";
            }
            
        }
    }
  
   
    
    
    

}
catch(PDOException $e){
   
}


// try{
//     $query="INSERT INTO student VALUES('$s_id','$s_tag','$s_name','$s_email','$s_password','$s_department','$s_batch','$s_phone','$s_photo','$running_trimester')";
//     $conn->exec($query);
    


// }
// catch(PDOException $e){
   
// }






?>