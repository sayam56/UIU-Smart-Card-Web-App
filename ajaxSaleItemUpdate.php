
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

    $count2;
    		if(isset($_GET['item_id'])) $item_id = $_GET['item_id'];
    		if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
        if(isset($_GET['saleQTY'])) $saleQTY = $_GET['saleQTY'];
        if(isset($_GET['prev_saleQTY'])) $prev_saleQTY = $_GET['prev_saleQTY'];
        if(isset($_GET['count'])) $count2 = $_GET['count'];
        if(isset($_GET['token'])) $token = $_GET['token'];

        $newsaleQTY = /*$prev_saleQTY+*/$saleQTY;
					$total_price=0; 
                    		
                    		

              try{
                	$up_sql = "UPDATE temp_transaction SET sale_qty='$newsaleQTY' WHERE vendor_id='$v_id' AND item_id='$item_id' AND token='$token' "  ;
 					$up_obj = $conn->prepare($up_sql)->execute();

 					} //bairer try

 					catch(PDOException $ex){
 						echo " update quantity failed";
                    
                } //bairer catch




                try{
                    $sql= "SELECT * FROM temp_transaction where vendor_id='$v_id' AND item_id='$item_id' AND token='$token' ";
                  $obj = $conn->query($sql);
                  $table1 = $obj->fetchAll();
                  foreach ($table1 as $key1) {
                    ?>
                      
                      <td width="2%"><?php echo $count2 ?></td> <!-- item count -->

                      <td width="16%"><?php echo $key1[3] ?></td> <!-- item name -->

                      <td width="18%"><?php echo $key1[4] ?> tk</td> <!-- unit price -->

                      <td width="16%"> <?php echo $key1[5]-$newsaleQTY ?></td> <!-- qty -->


                      <td width="16%">

                        <div class="">
                            <input type="text" class="upQTY" id="inputSaleQTY_<?php echo $key1[2]; ?>" name="inputSale_QTY" placeholder="<?php echo $key1[6] ?>" required>

                        </div>
                      
                         <button type="button" class="editBTN upBTN" style="vertical-align: middle;" onclick="saleQTY_update(<?php echo $key1[2]?>, <?php echo $count2; ?>, <?php echo $key1[6]?>);">Update</button>

                      </td> <!-- sale qty -->


                      <td width="16%">
                      <?php 
                      $sum = $key1[4]*$key1[6];
                      echo $sum;
                      $total_price+=$sum;
                      ?> <!-- sum price -->
                      </td>

                      <?php

                  }

                }
                catch(PDOException $e)
                {
                    echo $e;
                }

		?> 

