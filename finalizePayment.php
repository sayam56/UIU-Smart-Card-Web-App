<?php
$state=0;
     /*DB connect*/
  try{
        $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
        echo "<script>console.log('connection successful');</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<script>window.alert('connection error');</script>";
    }

        if(isset($_GET['vendor_id'])) $vendor_id = $_GET['vendor_id'];
        if(isset($_GET['tr_id'])) $tr_id = $_GET['tr_id'];
        if(isset($_GET['total_price'])) $total_price = $_GET['total_price'];
        $r_tag;


        echo "vendor_id: ".$vendor_id."<br>";
        echo "tr_id: ".$tr_id."<br>";

		echo "total_price: ".$total_price."<br>";


        try{
               $sqlquery=" SELECT r_tag FROM payment_state WHERE token='$tr_id' AND vendor_id='$vendor_id' ";
                 $object=$conn->query($sqlquery);
                 $table=$object->fetchAll();


                 foreach ($table as $key) {

                 	$r_tag=$key[0];

  
                 }/*foreach ends*/       

          }
          catch(PDOException $e)
          {
              echo $e;
          }


        /*   echo "r_tag: ".$r_tag."<br>";*/



	/*---------------------buyer balance minus-----------------------------------------*/
try{
   $sqlquery=" SELECT * FROM wallet WHERE r_tag='$r_tag' ";
     $object=$conn->query($sqlquery);
     $tab = $object->fetchAll();

     
     foreach ($tab as $wallet) {
     	if ($wallet[0] < $total_price) {
     		header("Location: insufficient_balance.php");
     	}/*if ends*/
     	else{
     		$state=1;
	 		try{
	 			$newbalance = $wallet[0]-$total_price;
	 			/*echo "newbalance: ".$newbalance."<br>";*/
	           $up_sql = "UPDATE wallet SET w_balance='$newbalance' WHERE r_tag='$r_tag' " ;
	           $up_obj = $conn->prepare($up_sql)->execute();		    


	          }/*inner try to check role*/
	          catch(PDOException $e1)
	          {
	              echo $e1;
	          }/*inner catch to check role*/

     	}/*else ends*/
     }/*outer foreach*/


}/*outer try to check sufficient balance*/
catch(PDOException $e)
{
  echo $e;
}/*outer catch*/



/*----------------------vendor balance plus-----------------------*/
if ($state==1) {
	# code...

try{
   $sqlquery=" SELECT v_reader FROM vendor WHERE vendor_id='$vendor_id' ";
     $object=$conn->query($sqlquery);
     $tab = $object->fetchAll();

     
     foreach ($tab as $v_reader) {
     			$vendor_rtag= $v_reader[0];

	 		try{
		 		 $sql=" SELECT * FROM wallet WHERE r_tag='$v_reader[0]' ";
			     $obj=$conn->query($sql);
			     $tabb = $obj->fetchAll();

			     foreach ($tabb as $wallet) {
			     	$vendorbalance = $wallet[0]+$total_price;
					/*echo "vendorbalance: ".$vendorbalance."<br>";*/
					$up_sql = "UPDATE wallet SET w_balance='$vendorbalance' WHERE r_tag='$v_reader[0]' " ;
					$up_obj = $conn->prepare($up_sql)->execute();
			     }


	          }/*inner try to check role*/
	          catch(PDOException $e1)
	          {
	              echo $e1;
	          }/*inner catch to check role*/

     	
     }/*outer foreach*/


}/*outer try to check sufficient balance*/
catch(PDOException $e)
{
  echo $e;
}/*outer catch*/



/*--------------------qty minus------------------------------------*/

try{
		$sql=" SELECT item_id,sale_qty FROM temp_transaction WHERE token='$tr_id' ";
	     $obj=$conn->query($sql);
	     $tabb = $obj->fetchAll();

	     foreach ($tabb as $item) {
	     	/*0 has the sold items id, and 1 has the sold qty*/
	     	try{
	     		$itemsql= "SELECT item_qty FROM item_list WHERE item_id='$item[0]' ";
	     		$object=$conn->query($itemsql);
	     		$itemTab=$object->fetchAll();
	     		foreach ($itemTab as $item_qty) {
	     			$newQTY = $item_qty[0]-$item[1];
	     			/*echo "item id ".$item[0]." item old qty: ".$item_qty[0]." item sold qty: ".$item[1]." and the updated qty is : ".$newQTY;*/
	     			$up_sql = "UPDATE item_list SET item_qty='$newQTY' WHERE item_id='$item[0]' " ;
					$up_obj = $conn->prepare($up_sql)->execute();

	     		}

	     	}/*inner try*/
	     	catch(PDOException $e){
	     		echo $e;
	     	}/*inner catch*/
	     }/*outer foreach*/




}/*outer try*/
catch(PDOException $es){
	echo $es;
}/*outer catch*/


/*-------------------------insert into transaction-----------------------*/


    try{
       $sqlquery=" INSERT INTO transaction (tr_id,r_tag,tr_amount,tr_type,vendor_id) VALUES ('$tr_id','$r_tag','$total_price','payment','$vendor_id') ";
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



/*---------------------empty tables payment_state and temp_transaction-----------------------*/

/*delete the payment_states*/
try {
	$sql="DELETE FROM payment_state WHERE token='$tr_id' ";
	$obj = $conn->query($sql);

} catch (PDOException $e) {
	echo "<script>console.log('delete(assign) UNSUCCESSFULL!!');</script>";
}
/*delete the temp_transactions */
try {
	$sql="DELETE FROM temp_transaction WHERE token='$tr_id' ";
	$obj = $conn->query($sql);

} catch (PDOException $e) {
	echo "<script>console.log('delete(assign) UNSUCCESSFULL!!');</script>";
}


header("Location: vendor_dashboard.php");


}/*state if*/


?>
