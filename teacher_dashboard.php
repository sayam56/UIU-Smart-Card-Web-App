<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Vendor</title>

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
         document.getElementById('catalog').style.display = 'inline';
         document.getElementById('wallet').style.display = 'none';
      });
      $(".wallet").click(function(){
         $(".wallet").addClass("active");
         $(".catalog").removeClass("active");
         document.getElementById('wallet').style.display = 'inline';
         document.getElementById('catalog').style.display = 'none';
      });

    });
  </script>
</head>

<?php
  session_start();
  $t_name=$_SESSION["t_name"];

  if (isset($_SESSION['t_name'])) {
     echo "<script>console.log('inside if and it works');</script>";
   } 
 else{
  echo "<script>window.alert('YOU HAVE LOGGED OUT! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }

  $t_email=$_SESSION["t_email"];
  $t_tag=$_SESSION["t_tag"];
  $t_id=$_SESSION["t_id"];
  $role=$_SESSION["role"];
  $t_photo=$_SESSION["t_photo"];


  $_SESSION["role"]=$role;
   $_SESSION["id"]=$t_id;

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
          <a href="profile.php" class="userName">
          <?php echo"$t_name"; ?>
          </a>

        <li><a href="profile.php">
          <img src="<?php echo $t_photo ?>">
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="#" class="catalog active">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Catalog</span></a></li>

        <li><a href="#" class="wallet">
          <span class="icon"><i class="fas fa-wallet"></i></span>
          <span class="title">Wallet</span>
          </a></li>

        <li><a href="logout.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">Logout</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container" >
    <div class="item" id="catalog">







   </div> <!-- catalog div -->

    <div class="item" id="wallet">

      <h1>Transactions</h1>
      <?php
      try{
        $balanceSQL= "SELECT w_balance FROM wallet WHERE r_tag='$v_reader' ";
        $balanceOBJ= $conn->query($balanceSQL);
        $balanceTable = $balanceOBJ->fetchAll();

        foreach ($balanceTable as $balance) {
          ?>
          <h1 id="balance">Balance: <?php echo $balance[0]; ?> tk </h1>
          <?php
        }

      }catch(PDOException $ex){

        echo $ex;
      }

      ?>
      

      

     <table class="table" style="width: 80%; margin: auto;  ">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="5%">Transaction No.</th>
                    <th width="25%">Amount</th>
                    <th width="25%">Buyer Tag</th>
                    <th width="45%">Transaction ID</th>
                  </tr>
                  
                </thead>
            
          
              
                <tbody class="table" style="color: black;">
                  <?php

                  $count = 1;
                  $sqll= "SELECT * FROM transaction where vendor_id= '".$v_id."'";
                  $objj = $conn->query($sqll);

                  if ($objj -> rowCount() == 0) {
                    #table is empty as in to room available
                    ?>
                      <tr>
                        <td colspan="7" style="text-align: center;">NOTHING TO SHOW</td>
                      </tr>
                    <?php
                  }else
                  {

                    $table2 = $objj->fetchAll();

                    foreach ($table2 as $vall) {
                   
                      ?>
                      
                      <tr style="border-bottom: 2px solid black; text-align:center; font-size: 20px; color: black;" id="trID_<?php echo $val[0]; ?>">

                        <td width="5%"><?php echo $count ?></td> 

                        
                        <td width="25%"><?php echo $vall[2] ?> tk</td>

                        <td width="25%"><?php echo $vall[1] ?> </td>

                        <td width="45%"><?php echo $vall[0] ?></td>


                       
                        <?php $count++; ?>
                      </tr>
                      <?php
                      
                    }/*foreach ends here*/
                  }

                  ?>

                </tbody>
              

              </table>



    </div> <!-- wallet div -->


  </div><!-- main container -->





</div> <!-- wrappper -->


<!-- The Modal -->



<!-- modal ends -->



<script>




  </script>


  
</body>
</html>