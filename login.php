<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ali Iktider Sayam">
	<meta name="description" content="RFID Based Smart Card System">
	<meta name="keywords" content="RFID,Smart,Card">
	<title>UIU Smart Card-Login</title>
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link href="//db.onlinewebfonts.com/c/643e59524d730ce6c6f2384eebf945f8?family=Microsoft+Sans+Serif" rel="stylesheet" type="text/css"/>
	<link href="css/index.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link rel="icon" href="res/logo.ico">

	<script src="https://kit.fontawesome.com/8b033dbcfa.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="section1" id="home">

			
		
			<img src="res/login/login.gif" class="gif responsive">
			<div class="moveLogo">
				<div class="enhance elementAnim">
					<!-- <p>Info</p> -->
					<a id="logo1" class="logoClass" href="index.html"> <img src="res/main_logo.png"> <div class="brand-name1">UIU <br> SMART CARD</div></a>
				</div>
			</div>
			
			
		</div><!-- section1 ends -->


		<form action="verifyuser.php" method="post">
			<div class="inputBox">
			<!-- here goes the input types -->
			
				<div class="container">

				    <label for="email"><b>Email</b></label>
				    <input type="text" placeholder="Enter Email" name="email" required>

				    <label for="pass"><b>Password</b></label>
				    <input type="password" placeholder="Enter Password" name="pass" required>

					</div><!-- container -->

			</div><!-- inputBox -->

			<div class="radioBTN">
				Choose Your Role:<br>
				<div>
					<span>
						<input type="radio" name="role"  value="student" checked> Student
					</span>
					<span>
    					<input type="radio" name="role"  value="teacher"> Teacher
    				</span>
    				<span>
    					<input type="radio" name="role"  value="vendor"> Vendor
    				</span>
    				<span>
    					<input type="radio" name="role"  value="admin"> Admin
    				</span>
				</div>				
			</div> <!-- radiobtn ends -->

			<button type="submit" class="loginBTN elementAnimLeft">LOGIN</button>

			</form>
		



		<!-- <a href="login.php"><input type="button" class="loginBTN elementAnimLeft" name="strtBTN" value="LOGIN"></a> -->





	<script>

		console.log("Designed and Coded By Ali Iktider Sayam");
	</script>



<!-- 




********************************************************
Implemented By Ali Iktider Sayam
github.com/sayam56
********************************************************



 -->

</body>
</html>