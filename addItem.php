<?php
	session_start();

		/*DB connect*/
			try{
                $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
                echo "<script>console.log('connection successful');</script>";
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<script>window.alert('connection error');</script>";
            }


	

            if(isset($_POST['item_name'])) $item_name=$_POST['item_name'];
            if(isset($_POST['unit_price'])) $unit_price=$_POST['unit_price'];
            if(isset($_POST['item_qty'])) $item_qty = $_POST['item_qty'];
            if(isset($_POST['vendor_id'])) $vendor_id = $_POST['vendor_id'];



         	$checkquery = "select * from item_list where item_name='$item_name' and vendor_id='$vendor_id' ";
            $returnvalue=$conn->query($checkquery);
            $rowcount=$returnvalue->rowCount();
            if($rowcount==1)
            {
                ?>
                    <script>
                        
                        window.alert("This item already exist, try a new one!");
                        window.location.assign("vendor_dashboard.php");
                    </script>
                <?php
            }else{

            	 try{
	                $sqlquery=" INSERT INTO item_list (item_name,unit_price,vendor_id,item_qty) VALUES ('$item_name','$unit_price','$vendor_id','$item_qty') ";
					$object=$conn->query($sqlquery);
				   /*header('Location: vendor_dashboard.php');*/
	                     ?>
	                  <script>
	                            window.alert("Item Inserted Successfully");
	                            window.location.assign("vendor_dashboard.php");
	                  </script>
	                <?php

	            } /*try ends*/

	            catch(PDOException $e){
	              		  ?>
	                  <script>
	                            window.alert("Item Insertion Error");
	                            window.location.assign("vendor_dashboard.php");
	                  </script>
	                <?php
	            	}

            }



           



		
	?>



</body>
</html>