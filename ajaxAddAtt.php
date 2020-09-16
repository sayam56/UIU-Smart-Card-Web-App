

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

		if(isset($_POST['sec_name'])) $sec_name = $_POST['sec_name'];
		if(isset($_POST['date'])) $date = $_POST['date'];
        if(isset($_POST['s_id'])) $s_id = $_POST['s_id'];
        if(isset($_POST['t_id'])) $t_id = $_POST['t_id'];

         $section = str_replace("_"," ","$sec_name");


    try {
        $check= "SELECT * FROM studentjsection where sec_name='$section' and s_id='$s_id' ";
        $cobj = $conn->query($check);
        if ($cobj->rowCount() == 0) {
            echo "<h1>Student Out Of Section</h1>";
        }else{

            try {

                $check2= "SELECT * FROM attendance where sec_name='$section' and s_id='$s_id' and date='$date' ";
                 $cobj2 = $conn->query($check2);
                 if ($cobj2->rowCount() == 0) {

                    $insert = $conn->prepare("INSERT INTO attendance(`sec_name`, `t_id`, `s_id`, `date`) values('$section','$t_id','$s_id','$date')");

                        $insert->execute();

                        echo "<h1>Student Attendance Updated</h1>";



                     
                 }else{
                        echo "<h1>Student Already Attended</h1>";
                 }
/*
                         echo "sec_name : ".$section."<br>";
                         echo "t_id : ".$t_id."<br>";
                         echo "s_id : ".$s_id."<br>";
                         echo "date : ".$date."<br>";*/  

                
            } catch (PDOException $ex) {
                echo $ex;
            }

           

        }
    } catch (PDOException $e) {
        echo $e;
    }


 
		?> 