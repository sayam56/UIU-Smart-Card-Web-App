<?php


        $s_id= $_POST['s_id'];
$sec_name=$_POST['section'];
$c_code=$_POST['c_code'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="INSERT INTO studentjsection VALUES('$s_id','$c_code','$sec_name')";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>Student Added to Section</h1>
        
      
    </div>
  </div>";
    


}
catch(PDOException $e){
   
}








      

    
    ?>
