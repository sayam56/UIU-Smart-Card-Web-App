<?php
$c_code= $_POST['c_code'];


$c_name= $_POST['c_name'];

var_dump($c_code."   ".$c_name);


try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
  
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
   
}


try{
    $query="INSERT INTO course VALUES('$c_code','$c_name')";
    $conn->exec($query);
    echo "<div class='modal-content'>
    <div class='modal-body'>
      
       <h1>New Course Added</h1>
        
      
    </div>
  </div>";
    
    


}
catch(PDOException $e){
   
}






?>