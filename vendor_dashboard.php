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




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

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
  $v_name=$_SESSION["v_name"];

  if (isset($_SESSION['v_name'])) {
     echo "<script>console.log('inside if and it works');</script>";
   } 
 else{
  echo "<script>window.alert('YOU HAVE LOGGED OUT! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }

   $v_uid=$_SESSION["v_uid"];
  $v_reader=$_SESSION["v_reader"];
  $v_id=$_SESSION["v_id"];



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
          <?php echo"$v_name"; ?>
          </a>

        <li><a href="profile.php">
          <i class="fas fa-user"></i>
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

      <h1>Item List</h1>
<button id="myBtn" class="addBTN" style="vertical-align:middle">Add Items</button>
     <table class="table" style="width: 75%; margin: auto;  ">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="5%">Item No.</th>
                    <th width="25%">Item Name</th>
                    <th width="25%">Unit Price</th>
                    <th width="25%">Quantity</th>
                    <th width="25%">Edit</th>
                  </tr>
                  
                </thead>
            
          
              
                <tbody class="table" style="color: black;">
                  <?php

                  $count = 1;
                  $sql= "SELECT * FROM item_list where vendor_id= '".$v_id."'";
                  $obj = $conn->query($sql);

                  if ($obj -> rowCount() == 0) {
                    #table is empty as in to room available
                    ?>
                      <tr>
                        <td colspan="3" style="text-align: center;">NOTHING TO SHOW</td>
                      </tr>
                    <?php
                  }else
                  {

                    $table1 = $obj->fetchAll();

                    foreach ($table1 as $val) {
                      # so rooms availble here
                      ?>
                      
                      <tr style="border-bottom: 2px solid black; text-align:center; font-size: 20px; color: black;">
                        <td width="25%"><?php echo $count++ ?></td>
                        <td width="25%"><?php echo $val[1] ?></td>
                        <td width="25%"><?php echo $val[2] ?> tk</td>
                        <td width="25%"><?php echo $val[4] ?></td>
                        <td width="25%">
                           <!-- room id ta send kora hocche and since users clicks this only if the user is a guest so user id ta guest hishebe send hbe -->

                           <button type="button" class="editBTN" data-toggle="modal" data-target="#passwordModal" style="vertical-align: middle;" onclick="showRoomG(<?php echo $val[0]?>);" >Edit</button>

                        </td>
                      </tr>
                      <?php
                    }
                  }

                  ?>

                </tbody>
              

              </table>









   </div> <!-- catalog div -->

    <div class="item" id="wallet">
      this is wallet text
    </div> <!-- wallet div -->


  </div><!-- main container -->





</div> <!-- wrappper -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">


      <h5 style="color:red;">⇝ Add New Item To The Menu - <h5>




           <!-- form here -->
            <form action="verifylocation.php" method="post"> 
    
              <label for="ltname"><b>Location</b></label>
              <input type="text" placeholder="Enter location" name="ltname" required>
              <br>
              <label for="rl1name"><b>Role 1</b></label>
              <input type="text" placeholder="Enter Role 1" name="rlname1" required>
              <br>
              <label for="rl2name"><b>Role 2</b></label>
              <input type="text" placeholder="Enter Role 2" name="rlname2" required>
              <br>
              <label for="rl3name"><b>Role 3</b></label>
              <input type="text" placeholder="Enter Role 3" name="rlname3" required>
              <br>
              <label for="rl4name"><b>Role 4</b></label>
              <input type="text" placeholder="Enter Role 4" name="rlname4" required>
              <br>
              <label for="rl5name"><b>Role 5</b></label>
              <input type="text" placeholder="Enter Role 5" name="rlname5" required>
              <br>
              <label for="rl6name"><b>Role 6</b></label>
              <input type="text" placeholder="Enter Role 6" name="rlname6" required>

                        <br>
                        

               <button type="submit" class="entrbtn">Add</button>
  
     
   </form>

 


  <h3 style="text-align:center; color: red;" > ENJOY! <h3>




      
    </div>
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- modal ends -->



<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  </script>
  
</body>
</html>