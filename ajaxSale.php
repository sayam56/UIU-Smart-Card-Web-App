
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

        $total_price=0;
		if(isset($_GET['item_id'])) $item_id = $_GET['item_id'];
		if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
        if(isset($_GET['token'])) $token = $_GET['token'];
					
                    		
               		

              try{
                	$sql = "SELECT * FROM item_list WHERE item_id=$item_id AND vendor_id=$v_id"  ;
 					$obj = $conn->query($sql);
                    $row= $obj->fetchAll();
                    foreach ($row as $key) {

                         $item_name=$key[1]; 
                         $unit_price=$key[2]; 
                         $available_qty=$key[4]; 
                                              
                    }


                    try{
                        $sql = "INSERT INTO temp_transaction (vendor_id, item_id, item_name, item_unit_price, available_qty, sale_qty, token) VALUES ('$v_id','$item_id','$item_name','$unit_price','$available_qty','1','$token')"  ;
                        $obj = $conn->query($sql);


                        

                    
                    } //inner try

                    catch(PDOException $ex){
                        echo "insertion into temp_transaction failed";
                    
                        } //inner catch


                    


 					} //bairer try

 					catch(PDOException $ex){
 						echo "insertion Failed";
                    
                } //bairer catch

               

		?> 

