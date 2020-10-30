<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    
}

$div="<div class='modal-content'>
<div class='modal-body'>";

$divclose="<button class='modalAddBTN' onclick='assignSectiondb_student()''>Confirm</button></div></div>";
$select="<select name='section' id='section'>";
$selectclose="</select>";
$str="";




  





try{
    $sqlquery="SELECT c_code,c_name FROM `course` ";
    $pdostmt=$conn->query($sqlquery);
    if($pdostmt->rowCount()>0)
    {
      $table=$pdostmt->fetchAll();
      foreach($table as $key)
       {
          $str=$str." 
            
          
           <optgroup id='course_code' label='$key[0]-$key[1]'>";
           try{
             $secquery="SELECT sec_name FROM `section` WHERE c_code='$key[0]' ";
             $pdostmt=$conn->query($secquery);
             if($pdostmt->rowCount()>0)
             {
                 $table1=$pdostmt->fetchAll();
                 foreach($table1 as $key1)
                 {
                     $str=$str." <option value='$key1[0]'>$key1[0]</option>";
                 }

             }


           }
           catch(PDOException $ex)
           {
             echo ("query error");
           }
           $str=$str."</optgroup>";

       
          
           
           
          
    
              
      }
     // echo ($select.$str.$selectclose);
      echo ($div.$select.$str.$selectclose.$divclose);
     
    }
    
}

catch(PDOException $ex)
        {
          echo ("query error");
        }

    



?>