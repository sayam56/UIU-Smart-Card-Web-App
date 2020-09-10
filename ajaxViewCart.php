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
		/*if(isset($_GET['item_id'])) $item_id = $_GET['item_id'];*/
		if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
        if(isset($_GET['token'])) $token = $_GET['token'];


        $total_price=0;     
        $count2=1;

        try{
                        $sql1 = "SELECT * FROM temp_transaction WHERE token='$token' AND vendor_id='$v_id' "  ;
                        $obj1 = $conn->query($sql1);
                        $row1= $obj1->fetchAll();


                        ?>

              <table class="table" style="width: 85%; margin: auto; height: 480px; margin-bottom: 50px;">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="2%">Item No.</th>
                    <th width="16%">Item Name</th>
                    <th width="18%">Unit Price</th>
                    <th width="16%">Quantity</th>
                    <th width="16%">SALE QTY</th>
                    <th width="16%">SUM</th>
                  </tr>
                  
                </thead>
            
          
              
                <tbody class="table" style="color: black;" id="checkTP">

                        <?php

                        if ($obj1->rowCount() == 0) {
                          ?>

                         <tbody class="table" style="color: black;">
                          <div >
                            <tr id="orderTable">
                                <td colspan="7" style="text-align: center;">PLEASE ADD ITEMS TO THE CART</td>
                              </tr>
                          </div>
                              


                        </tbody>


                          <?php
                        }else{
                       
                        foreach ($row1 as $key1) {
                            ?>
                                <tr style="text-align:center; font-size: 20px; color: black;" id="saletrID_<?php echo $key1[2]; ?>">

                                <td width="2%"><?php echo $count2 ?></td> <!-- item count -->

                                <td width="16%"><?php echo $key1[3] ?></td> <!-- item name -->

                                <td width="18%"><?php echo $key1[4] ?> tk</td> <!-- unit price -->

                                <td width="16%"> <?php echo $key1[5]-$key1[6] ?></td> <!-- qty -->


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

                           </tr>


                            <?php
                            /*echo 'saletrID_'.$key1[2];*/
                            $count2++;
                            }/*foreach ends*/
                    
                    ?>


                      </tbody>
              

              </table>
              <?php
            }/*else*/
                        } //inner inner try

                    catch(PDOException $ex1){
                        echo $ex1;
                        } //inner inner catch

                        ?>

            <div class="calcBTN" style="margin-left: 500px; margin-top: -40px; color: red; margin-bottom: 8px; font-size: 20px; font-weight: 600;">

              <button class="editBTN" id="finalize" style="margin-right: 25px;" onclick="finalize(<?php echo $total_price ?>);">Finalize</button>

              <button class="editBTN" onclick="cartModal();" style="margin-right: 25px;">Calculate</button>

              Total Price is: <?php echo $total_price;?> 

                  

                

            </div>
                              
                      

                         
                       

					

