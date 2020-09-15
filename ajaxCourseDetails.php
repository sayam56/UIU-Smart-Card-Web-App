
<?php
date_default_timezone_set('Asia/Dhaka'); 


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
  if(isset($_GET['t_id'])) $t_id = $_GET['t_id'];
  if(isset($_GET['c_name'])) $c_name = $_GET['c_name'];
					
  $section = str_replace("_"," ","$sec_name");
  $course = str_replace("_"," ","$c_name");          
  $date = date("Y-m-d"); //contains current date in the given format
  $count2=1;
  $count=1;

  try{
    	$sql = "SELECT * FROM `classdate` WHERE sec_name='".$section."' and date<='".$date."' "  ;
        $obj = $conn->query($sql);
        $row= $obj->fetchAll();


        ?>
        <div id="catalog"> <h1><?php echo $section ?>: <?php echo $course ?> </h1> </div>
        
        <table class="table" style="width: 80%; margin: auto; height: 480px; margin-bottom: 50px;">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="10%">Class No.</th>
                    <th width="30%">Date</th>
                    <th width="30%">Class Type</th>
                    <th width="30%">View Records</th>
                  </tr>
                  
                </thead>

                 <tbody class="table" style="color: black;" id="checkTP">

                  <?php

                  if ($obj->rowCount() == 0) {
                    ?>

                   <tbody class="table" style="color: black;">
                    <div >
                      <tr id="orderTable">
                          <td colspan="4" style="text-align: center;">NO CLASSES HAVE BEEN RECORDED YET</td>
                        </tr>
                    </div>
                        


                  </tbody>
                  

        <?php

         }else{
        foreach ($row as $key) {
          ?>
          <tr style="text-align:center; font-size: 20px; color: black;" id="">

            <td width="2%"><?php echo $count2 ?></td> 

            <td width="16%"><?php echo $key[1] ?></td> 

            <td width="18%"><?php echo $key[2] ?> </td> 


            <td width="16%">
            
               <button type="button" class="editBTN upBTN" id="btn_<?php echo $key[1] ?>"  onclick="recView('<?php echo $key[1]; ?>' , '<?php echo $sec_name; ?>');">View</button>

            </td> <!-- sale qty -->


       </tr>


        <?php
        /*echo 'saletrID_'.$key1[2];*/
        $count2++;
                             
        } /*foreach ends*/
                            ?>


                      </tbody>
              

              </table>
          <div id="catalog"> <h1 style="color: green;"> Upcoming Classes </h1> </div>
           
              <?php
      }/*else ends*/

  } //bairer try

	catch(PDOException $ex){
		echo $ex;
          
      } //bairer catch










      try{
      $sql = "SELECT * FROM `classdate` WHERE sec_name='".$section."' and date>'".$date."' "  ;
        $obj = $conn->query($sql);
        $row= $obj->fetchAll();


        ?>

        
        <table class="table" style="width: 80%; margin: auto; height: 480px; margin-bottom: 50px;">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="10%">Class No.</th>
                    <th width="30%">Date</th>
                    <th width="30%">Class Type</th>
                    
                  </tr>
                  
                </thead>

                 <tbody class="table" style="color: black;" id="checkTP">

                  <?php

                  if ($obj->rowCount() == 0) {
                    ?>

                   <tbody class="table" style="color: black;">
                    <div >
                      <tr id="orderTable">
                          <td colspan="3" style="text-align: center;">NO UPCOMING CLASSES</td>
                        </tr>
                    </div>
                        


                  </tbody>

        <?php

         }else{
        foreach ($row as $key) {
          ?>
          <tr style="text-align:center; font-size: 20px; color: black;" id="">

            <td width="2%"><?php echo $count ?></td> 

            <td width="16%"><?php echo $key[1] ?></td> 

            <td width="18%"><?php echo $key[2] ?> </td> 


       </tr>


        <?php
        /*echo 'saletrID_'.$key1[2];*/
        $count++;
                             
        } /*foreach ends*/
                            ?>


                      </tbody>
              

              </table>
              <?php
      }/*else ends*/

  } //bairer try

  catch(PDOException $ex){
    echo $ex;
          
      } //bairer catch

               

		?> 

