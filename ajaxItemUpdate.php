
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

    $count;
		if(isset($_GET['item_id'])) $item_id = $_GET['item_id'];
		if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
        if(isset($_GET['qty_val'])) $qty_val = $_GET['qty_val'];
        if(isset($_GET['qty'])) $qty = $_GET['qty'];
        if(isset($_GET['count'])) $count = $_GET['count'];

        $newQTY = $qty+$qty_val;
					
                    		
                    		

              try{
                	$up_sql = "UPDATE item_list SET item_qty='$newQTY' WHERE vendor_id='$v_id' AND item_id='$item_id' "  ;
 					$up_obj = $conn->prepare($up_sql)->execute();

 					} //bairer try

 					catch(PDOException $ex){
 						echo " update quantity failed";
                    
                } //bairer catch




                try{
                    $sql= "SELECT * FROM item_list where vendor_id='$v_id' AND item_id='$item_id' ";
                  $obj = $conn->query($sql);
                  $table1 = $obj->fetchAll();
                  foreach ($table1 as $val) {

                    ?>
                      
                        <td width="2%"><?php echo $count ?></td> 
                        <td width="16%"><?php echo $val[1] ?></td>
                        <td width="18%"><?php echo $val[2] ?> tk</td>
                        <td width="16%" id="qty_<?php echo $val[0]; ?>" value="<?php echo $val[4]; ?>"><?php echo $val[4] ?></td>
                        <td width="16%">

                          <div class="">
                              <input type="text" class="upQTY" id="inputQTY_<?php echo $val[0]; ?>" name="input_QTY" placeholder="Quantity" required>

                          </div>
                        

                           <button type="button" class="editBTN upBTN" id="upBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="updateQTY(<?php echo $val[0]; ?>, <?php echo $count; ?>);">Update</button>

                        </td>
                        <td width="16%">
                        
                           <button type="button" class="editBTN" id="delBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="confirmModal(<?php echo $val[0]; ?>);">Delete</button>

                        </td>

                        <td width="16%">

                           <button type="button" class="editBTN" id="addBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="sale(<?php echo $val[0]; ?>);" >Add</button>

                        </td>

                      <?php

                  }

                }
                catch(PDOException $e)
                {
                    echo $e;
                }

		?> 
								

