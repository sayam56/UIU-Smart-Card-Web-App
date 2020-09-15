
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

		if(isset($_GET['sec_name'])) $sec_name = $_GET['sec_name'];
		if(isset($_GET['cdate'])) $cdate = $_GET['cdate'];
        if(isset($_GET['s_id'])) $s_id = $_GET['s_id'];

         $section = str_replace("_"," ","$sec_name");
					
                    		
                    		

              try{
                	$gsql = "DELETE FROM attendance WHERE sec_name='".$section."' AND date='$cdate' AND s_id='$s_id' "  ;
 					$gobj = $conn->query($gsql);



 					} //bairer try

 					catch(PDOException $ex){
 						echo "failed";
                    
                } //bairer catch


		?> 
								

