
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
               $sqlquery=" INSERT INTO payment_state (vendor_id,total_price,token,payment_state) VALUES ('$v_id','$total_price','$token','pending') ";
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


		?> 

