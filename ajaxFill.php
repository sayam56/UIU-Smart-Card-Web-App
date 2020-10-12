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

		if(isset($_GET['id'])) $id = $_GET['id'];
		if(isset($_GET['amount'])) $amount = $_GET['amount'];


    try {
        $check= "SELECT r_tag FROM rfid where r_id='$id' ";
        $cobj = $conn->query($check);
        if ($cobj->rowCount() == 0) {
            echo "<h1>tag not found</h1>";
            echo 'error';
        }else{

            $ctab = $cobj->fetchAll();

            foreach ($ctab as $rtag) {
                $balance_sql = "SELECT w_balance FROM wallet WHERE r_tag='$rtag[0]' ";
                $balance_obj= $conn->query($balance_sql);
                $balance_tab = $balance_obj->fetchAll();

                foreach ($balance_tab as $balance) {
                   
                    try {
                        $newAmount= $balance[0]+$amount;
                        $up_sql = "UPDATE wallet SET w_balance='$newAmount' WHERE r_tag='$rtag[0]' "  ;
                        $up_obj = $conn->prepare($up_sql)->execute();
                        echo 'updated';
                       
                    } catch (PDOException $th) {
                        echo $th;
                    }

                }
            }

   

           

        }
    } catch (PDOException $e) {
        echo $e;
    }


 
		?> 