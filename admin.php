<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Student</title>

  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="icon" href="res/logo.ico">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  

  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
         $(".wrapper").toggleClass("collapse");
      });

      $(".catalog").click(function(){
         $(".catalog").addClass("active");
         $(".wallet").removeClass("active");
         $(".live").removeClass("active");
         $(".courses").removeClass("active");

         document.getElementById('catalog').style.display = 'inline';
         document.getElementById('wallet').style.display = 'none';
         document.getElementById('live').style.display = 'none';
         document.getElementById('courses').style.display = 'none';
      });
      $(".wallet").click(function(){
         $(".wallet").addClass("active");
         $(".catalog").removeClass("active");
         $(".live").removeClass("active");
         $(".courses").removeClass("active");

         document.getElementById('wallet').style.display = 'inline';
         document.getElementById('catalog').style.display = 'none';
         document.getElementById('live').style.display = 'none';
         document.getElementById('courses').style.display = 'none';
      });


      $(".courses").click(function(){
        $(".courses").addClass("active");
        $(".catalog").removeClass("active");
        $(".wallet").removeClass("active");
        $(".live").removeClass("active");

        document.getElementById('courses').style.display = 'inline';
        document.getElementById('catalog').style.display = 'none';
        document.getElementById('wallet').style.display = 'none';
        document.getElementById('live').style.display = 'none';

      });


      $(".live").click(function(){
        $(".live").addClass("active");
        $(".catalog").removeClass("active");
        $(".wallet").removeClass("active");
        $(".courses").removeClass("active");

        document.getElementById('live').style.display = 'inline';
        document.getElementById('catalog').style.display = 'none';
        document.getElementById('wallet').style.display = 'none';
        document.getElementById('courses').style.display = 'none';
      });


  

    });
  </script>
</head>

<?php
  session_start();
  $su_name=$_SESSION["su_name"];

  if (isset($_SESSION['su_name'])) {
     echo "<script>console.log('inside if and it works');</script>";
   } 
 else{
  echo "<script>window.alert('YOU HAVE LOGGED OUT! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }


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

<body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Menu</div>
      <div class="logo"> UIU SMART CARD </div>
      <ul>
        <!-- <li><a href="#">
          <i class="fas fa-search"></i></a></li>
        <li><a href="#">
          <i class="fas fa-bell"></i>
          </a></li> -->
          <a href="#" class="userName">
          <?php echo"$su_name"; ?>
          </a>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="#" class="catalog active">
          <span class="icon"><i class="fas fa-user-graduate"></i></span>
          <span class="title">Students</span></a></li>

        <li><a href="#" class="wallet">
          <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
          <span class="title">Teachers</span>
          </a></li>

           <li><a href="#" class="courses">
          <span class="icon"><i class="fas fa-stream"></i></span>
          <span class="title">Courses</span>
          </a></li>

          <li><a href="#" class="live">
          <span class="icon"><i class="fas fa-store"></i></span>
          <span class="title">Vendors</span>
          </a></li>

        <li><a href="logout.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">Logout</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container" >


    <div class="item" id="catalog">
      <h1>Students</h1>


   </div> <!-- catalog div ends-->




    <div class="item" id="wallet">

      <h1>Teachers</h1>


    </div> <!-- wallet div ends -->


     <div class="item" id="courses">

    <h1>Courses</h1>
      
    </div> <!-- live attendance DIV -->



    
  <div class="item" id="live">

    <h1>Vendors</h1>
      
    </div> <!-- live attendance DIV -->

  

  </div><!-- main container -->







</div> <!-- wrappper -->


<!-- The Modal -->







<!-- modal ends -->



<script>





  </script>


  
</body>
</html>