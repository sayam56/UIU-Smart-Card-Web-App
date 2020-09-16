
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
  if(isset($_GET['t_id'])) $t_id = $_GET['t_id'];
  if(isset($_GET['date'])) $date = $_GET['date'];
					
  $section = str_replace("_"," ","$sec_name");
   $count2=1;

/* echo "sec_name : ".$section."<br>";
 echo "t_id : ".$t_id."<br>";
 echo "date : ".$date."<br>";  */


 /*begin here
  

  tarpor iccha hole teacher attendance add/edit korte parbe
  and shei add/edit btn ta ei date er bhetore giyei korte parbe
  cause the idea is , teahcer tar course/section er bhetore dhuke, kono ekta date select kore oi date e kono particular student er attendance either dibe, or take absent kore dibe, ekhon absent mane holo delete, karon amader ekhane att_type==present/absent name kichu nai.

 */       

  try{
      $sql = "SELECT * FROM attendance WHERE t_id='$t_id' AND sec_name='$section' AND date='$date' GROUP BY s_id "  ;
        $obj = $conn->query($sql);
        $row= $obj->fetchAll();


        ?>
        <div id="catalog"> 
          <h1>Attendance List For <?php echo $section ?> 

          <button class="editBTN upBTN" id="addAttBTN" style="width: 150px; height: 40px; margin-left: 5vw;" onclick="addAtt('<?php echo $sec_name ?>', '<?php echo $t_id ?>', '<?php echo $date ?>');" >Add Attendance</button>


           </h1>

         </div>
        
         <table class="table" style="width: 90%; margin: auto; height: 480px; margin-bottom: 50px;">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="5%">Serial No.</th>
                    <th width="15%">Student ID.</th>
                    <th width="25%">Student Name</th>
                    <th width="17%">Class Date</th>
                    <th width="25%">Entry Date & Time</th>
                    <th width="13%">Remove Attendance</th>
                  </tr>
                  
                </thead>

                 <tbody class="table" style="color: black;" id="checkTP">

                  <?php

                  if ($obj->rowCount() == 0) {
                    ?>

                   <tbody class="table" style="color: black;">
                    <div >
                      <tr id="orderTable">
                          <td colspan="6" style="text-align: center;">NO ATTENDANCE HAVE BEEN RECORDED YET</td>
                        </tr>
                    </div>
                        


                  </tbody>
                  

        <?php

         }else{
        foreach ($row as $key) {
            $s_name;
            $sql2 = "SELECT s_name FROM student WHERE s_id='$key[2]' "  ;
            $obj2 = $conn->query($sql2);
            $row2= $obj2->fetchAll();

            foreach ($row2 as $k) {
              $s_name = $k[0];
            }

          ?>
          <tr style="text-align:center; font-size: 20px; color: black;" id="tr_<?php echo $key[2] ?>">

            <td width="5%"><?php echo $count2 ?></td> 

            <td width="15%">0<?php echo $key[2] ?></td> 

            <td width="25%"><?php echo $s_name ?> </td> 

            <td width="17%"><?php echo $key[3] ?> </td> 

            <td width="25%"><?php echo $key[4] ?> </td> 

            <td width="13%">
              <button type="button" class="editBTN upBTN" id=""  onclick="removeAtt('<?php echo $key[2] ?>', '<?php echo $key[3] ?>' , '<?php echo $sec_name ?>');">Remove</button>
             </td> 

       </tr>


        <?php
        /*echo 'saletrID_'.$key1[2];*/
        $count2++;
                             
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




$sec_name = '';
 $t_id = '';
 $date = '';


          

		?> 

