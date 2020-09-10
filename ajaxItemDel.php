
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

		if(isset($_GET['item_id'])) $item_id = $_GET['item_id'];
		if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
					
                    		
                    		

              try{
                	$gsql = "DELETE FROM item_list WHERE item_id=$item_id AND vendor_id=$v_id"  ;
 					$gobj = $conn->query($gsql);



 					} //bairer try

 					catch(PDOException $ex){
 						echo "failed";
                    
                } //bairer catch


		?> 
								

