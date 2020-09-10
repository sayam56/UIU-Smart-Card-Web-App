
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

        if(isset($_GET['v_id'])) $v_id = $_GET['v_id'];
        if(isset($_GET['total_price'])) $total_price = $_GET['total_price'];
        if(isset($_GET['token'])) $token = $_GET['token'];

          try{
               $sqlquery=" SELECT r_tag,payment_state FROM payment_state WHERE token='$token' AND vendor_id='$v_id' ";
                 $object=$conn->query($sqlquery);
                 $table=$object->fetchAll();


                 foreach ($table as $key) {



                  /*echo $key[0];*/

                   if ( empty($key[0]) == 0  && $key[1] === 'complete' ) {

                  
                    echo "redirect";
                         
                       }/*if ends*/

  
                 }/*foreach ends*/

                
            

          }
          catch(PDOException $e)
          {
              echo $e;
          }


    ?> 

