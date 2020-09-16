<?php
	session_start();

		/*DB connect*/
			try{
                $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
                echo "<script>console.log('connection successful');</script>";
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<script>window.alert('connection error');</script>";
            }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ali Iktider Sayam">
	<meta name="description" content="RFID Based Smart Card System">
	<meta name="keywords" content="RFID,Smart,Card">
	<title>UIU Smart Card-Verify</title>
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link href="//db.onlinewebfonts.com/c/643e59524d730ce6c6f2384eebf945f8?family=Microsoft+Sans+Serif" rel="stylesheet" type="text/css"/>
	<link href="css/index.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link rel="icon" href="res/logo.ico">

	<script src="https://kit.fontawesome.com/8b033dbcfa.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php

	

            if(isset($_POST['email'])) $email=$_POST['email'];
            if(isset($_POST['password'])) $password=$_POST['password'];
            if(isset($_POST['role'])) $role = $_POST['role'];



            if ($role == 'student') {
            	
	            	try{
	                $sqlquery="SELECT * from student where s_email= '".$email."' and s_password= '".$password."' ";
					$object=$conn->query($sqlquery);
					$row= $object->rowCount();
					
					$is_invalid=0;
					while( $row>0) {
			
			 			 	$row1= $object->fetchAll();
									foreach ($row1 as $key) {
										$_SESSION["s_name"]= $key[2];
            							$_SESSION["s_email"]=$email;
            							$_SESSION["s_tag"]=$key[1];
            							$_SESSION["s_id"]=$key[0];
            							$_SESSION["role"]=$role;
            							$_SESSION["s_photo"]=$key[8];
		                            header('Location: student_dashboard.php');
		                            break;
		                            }
		
						
						#header('Location:redirecthtml.html');
						#echo 'WELCOME'.$fname." "."<br>";
						$is_invalid=1;
						break;

					}

		
					if ($is_invalid==0)
					{
						#echo "invalid Passcode or Username";
						header('Location: incorrect_password.html');
					} 

	            } /*try ends*/

	            catch(PDOException $e){
	                echo "<script>window.alert('validation error');</script>";
	            	}
            	
            }




            else if ($role == 'teacher')
            {
		            try{
		                $sqlquery="SELECT * from teacher where t_email= '".$email."' and t_password= '".$password."' ";
						$object= $conn->query($sqlquery);
						$row= $object->rowCount();
						echo "from member $row";
		                $is_invalid=0;

					while($row>0) {


			            $row1= $object->fetchAll();
						foreach ($row1 as $key) {
							$_SESSION["t_name"]= $key[2];
							$_SESSION["t_email"]=$email;
							$_SESSION["t_tag"]=$key[1];
							$_SESSION["t_id"]=$key[0];
							$_SESSION["role"]=$role;
							$_SESSION["t_photo"]=$key[7];
	                        header('Location: teacher_dashboard.php');
	                        break;
                        }
						#echo 'WELCOME'.$fname." "."<br>";
						$is_invalid = 1;
						break;
					}
					
		
					if ($is_invalid==0)
					{
						#echo "invalid Passcode or Username";
						header('Location: incorrect_password.html');
					} 
		                
		            } /*try ends*/

		            catch(PDOException $e){
		                echo "<script>window.alert('validaiton error');</script>";
		            }
        }

        else{

        	try{
		                $sqlquery="SELECT * from vendor where vendor_uid= '".$email."' and vendor_password= '".$password."' ";
						$object= $conn->query($sqlquery);
						$row= $object->rowCount();
						echo "from member $row";
		                $is_invalid=0;

					while($row>0) {


			            $row1= $object->fetchAll();
						foreach ($row1 as $key) {
							$_SESSION["v_name"]= $key[2];
							$_SESSION["v_uid"]=$email;
							$_SESSION["v_reader"]=$key[0];
							$_SESSION["v_id"]=$key[1];
							$_SESSION["role"]=$role;
							$_SESSION["photo"]=$key[7];
	                        header('Location: vendor_dashboard.php');
	                        break;
                        }
						#echo 'WELCOME'.$fname." "."<br>";
						$is_invalid = 1;
						break;
					}
					
		
					if ($is_invalid==0)
					{
						#echo "invalid Passcode or Username";
						header('Location: incorrect_password.html');
					} 
		                
		            }

		            catch(PDOException $e){
		                echo "<script>window.alert('validaiton error');</script>";
		            }

        }



		
	?>



</body>
</html>