<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Fill Up</title>

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
          <span class="icon"><i class="fas fa-cash-register"></i></span>
          <span class="title">Fill Up</span></a></li>

        <li><a href="#" class="wallet">
          <span class="icon"><i class="fas fa-money-check-alt"></i></span>
          <span class="title">Transactions</span>
          </a></li>

        <li><a href="logout.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">Logout</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container" >


    <div class="item" id="catalog">
      <h5 style="font-size: 4vh; text-align: center; margin-bottom:8vh;">⇝ Please Enter ID & Amount - <h5>
       <div class="inputBox" style="height: 20vh; width: 45vw;">
          <!-- here goes the input types -->
          
            <div class="textbox">
                      <i class="far fa-id-card"></i>
                      <input type="text" name="id" id="fillerID" placeholder="Enter ID" required>
                    </div>

                  <div class="textbox">
                     <i class="fas fa-sort-amount-up"></i>
                      <input type="text" name="amount" id="fillerAmount" placeholder="Enter Amount To Add" required>
                  </div>   

          </div><!-- inputBox -->

          <button type="submit" class="refillBTN" onclick="refillWallet();">Refill Wallet</button>

   </div> <!-- catalog div ends-->




    <div class="item" id="wallet">
    <h1>Transactions:</h1>

      

     <table class="table" style="width: 80%; margin: auto;  ">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="5%">Transaction No.</th>
                    <th width="25%">Vendor Name</th>
                    <th width="25%">Payer Tag</th>
                    <th width="25%">Amount</th>
                    
                    <th width="45%">Transaction ID</th>
                  </tr>
                  
                </thead>
            
                   
                <tbody class="table" style="color: black;">
                  <?php

                  $count = 1;
                  $sqll= "SELECT * FROM transaction ";
                  $objj = $conn->query($sqll);

                  if ($objj -> rowCount() == 0) {
                    #table is empty as in to room available
                    ?>
                      <tr>
                        <td colspan="5" style="text-align: center;">NOTHING TO SHOW</td>
                      </tr>
                    <?php
                  }else
                  {

                    $table2 = $objj->fetchAll();

                    foreach ($table2 as $vall) {
                   
                      ?>
                      
                      <tr style="border-bottom: 2px solid black; text-align:center; font-size: 20px; color: black;" id="trID_<?php echo $val[0]; ?>">

                        <td width="5%"><?php echo $count ?></td> 

                        <?php 
                          $sqlname= "SELECT vendor_name FROM vendor where vendor_id= '".$vall[4]."'";
                          $objname = $conn->query($sqlname);
                          $tablename = $objname->fetchAll();

                          foreach ($tablename as $valname) {
                            $vendor_name = $valname[0];
                          }


                        ?>

                        <td width="25%"><?php echo $vendor_name ?> </td>

                        <td width="25%"><?php echo $vall[1] ?> </td>


                        <td width="25%"><?php echo $vall[2] ?> tk</td>


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


<div id="successModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close finalClose">&times;</span>
      
    </div>
    <div class="modal-body">
    <h1>Fill Up Successful!</h1>

   
      <div id="successBody">
        
      </div>
    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- successModal ends -->


<div id="errorModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close errClose">&times;</span>
      
    </div>
    <div class="modal-body">
    <h1>!!! ERROR !!!</h1>

   
      <div id="r_tag">
        
      </div>
    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- errorModal ends -->






<!-- modal ends -->



<script>

function refillWallet(){
	var id= $('#fillerID').val();
	var amount = $('#fillerAmount').val();


	var ajaxreq=new XMLHttpRequest();
	ajaxreq.open("GET","ajaxFill.php?&id="+id+'&amount='+amount); 


	  ajaxreq.onreadystatechange=function ()
	  {
	   if(ajaxreq.readyState==4 && ajaxreq.status==200)
	          {
	               var response=ajaxreq.responseText;
	              
	              if (response.includes('updated')) {
                  var modal = document.getElementById("successModal");

                  // Get the button that opens the modal
                  var btn = document.getElementById("finalize");

                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("finalClose")[0];

                  modal.style.display = "block";


                  span.onclick = function() {
                    modal.style.display = "none";
                    
                  }

                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }

                } /* udpated ends */
                else{
                  var modal = document.getElementById("errorModal");

                  // Get the button that opens the modal
                  var btn = document.getElementById("finalize");

                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("errClose")[0];

                  modal.style.display = "block";


                  span.onclick = function() {
                    modal.style.display = "none";
                    
                  }

                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
                } /* else error */
	              
	              
	               divelm.innerHTML=response;
	               
	          }
	  }
	  
	  ajaxreq.send();
	}



  </script>


  
</body>
</html>