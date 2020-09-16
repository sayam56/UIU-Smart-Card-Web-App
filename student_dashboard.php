<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Teacher</title>

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
         document.getElementById('catalog').style.display = 'inline';
         document.getElementById('wallet').style.display = 'none';
      });
      $(".wallet").click(function(){
         $(".wallet").addClass("active");
         $(".catalog").removeClass("active");
         $(".live").removeClass("active");
         document.getElementById('wallet').style.display = 'inline';
         document.getElementById('catalog').style.display = 'none';
      });


  

    });
  </script>
</head>

<?php
  session_start();
  $s_name=$_SESSION["s_name"];

  if (isset($_SESSION['s_name'])) {
     echo "<script>console.log('inside if and it works');</script>";
   } 
 else{
  echo "<script>window.alert('YOU HAVE LOGGED OUT! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }

  $s_email=$_SESSION["s_email"];
  $s_tag=$_SESSION["s_tag"];
  $s_id=$_SESSION["s_id"];
  $role=$_SESSION["role"];
  $s_photo=$_SESSION["s_photo"];



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
          <?php echo"$s_name"; ?>
          </a>

        <li><a href="profile.php">
          <img src="<?php echo $s_photo ?>">
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="#" class="catalog active">
          <span class="icon"><i class="fas fa-university"></i></span>
          <span class="title">Courses</span></a></li>

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
      <h1>Running Courses:</h1>
      <div class="courses">

      <?php

        try{

          $query = "SELECT c_code FROM teacherjcourse WHERE t_id='$t_id' ";
          $cobj = $conn->query($query);

          if ($cobj->rowCount() == 0) {
            ?>

            <h1>No courses taken this trimester</h1>

            <?php
          } /*if ends*/

          else{

          $ctable = $cobj->fetchAll();

          foreach ($ctable as $c_code) {

          $sec_nameqry = "SELECT sec_name FROM section WHERE c_code='".$c_code[0]."' AND t_id='$t_id' ";
          $sec_nameobj = $conn->query($sec_nameqry);
          $sec_nametab = $sec_nameobj->fetchAll();

          foreach ($sec_nametab as $sec_name) {


              $c_nameqry = "SELECT c_name FROM course WHERE c_code='".$c_code[0]."' ";
              $c_nameobj = $conn->query($c_nameqry);
              $c_nametable = $c_nameobj->fetchAll();
              foreach ($c_nametable as $c_name ) {
                  ?>

                <div class="cards">
                
                <h3><?php echo $sec_name[0]; ?></h3>

                <h4><?php echo $c_name[0]; ?></h4>

                <?php 
                $sec_name=  str_replace(" ","_","$sec_name[0]"); 
                  $c_name=  str_replace(" ","_","$c_name[0]"); 
                  ?>

                <button id="detailsBTN_<?php echo $sec_name; ?>" onclick="courseDetails('<?php echo $sec_name ?>','<?php echo $c_name ?>');">DETAILS</button>
              </div> <!-- cards end -->

                <?php

              } /*inner inner foreach ends*/

          } /*inner foreach*/


         
            
          } /*outer for each*/

        }/*else ends*/

        }catch(PDOException $e){

          echo $e;
        }/*catch ends*/

      ?>


     
          
      
            
           
         

      </div><!-- courses end -->

   </div> <!-- catalog div ends-->




    <div class="item" id="wallet">

      <h1>Transactions</h1>
      <?php
      try{
        $balanceSQL= "SELECT w_balance FROM wallet WHERE r_tag='$t_tag' ";
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
                    <th width="25%">Vendor ID</th>
                    <th width="45%">Transaction ID</th>
                  </tr>
                  
                </thead>
            
          
              
                <tbody class="table" style="color: black;">
                  <?php

                  $count = 1;
                  $sqll= "SELECT * FROM transaction where r_tag= '".$t_tag."'";
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
                        <?php 
                          $sqlname= "SELECT vendor_name FROM vendor where vendor_id= '".$vall[4]."'";
                          $objname = $conn->query($sqlname);
                          $tablename = $objname->fetchAll();

                          foreach ($tablename as $valname) {
                            $vendor_name = $valname[0];
                          }


                        ?>

                        <td width="25%"><?php echo $vendor_name ?> </td>

                        <td width="45%"><?php echo $vall[0] ?></td>


                       
                        <?php $count++; ?>
                      </tr>
                      <?php
                      
                    }/*foreach ends here*/
                  }

                  ?>

                </tbody>
              

              </table>



    </div> <!-- wallet div ends -->

  

  </div><!-- main container -->







</div> <!-- wrappper -->


<!-- The Modal -->



<!-- modal ends -->



<script>



  </script>


  
</body>
</html>