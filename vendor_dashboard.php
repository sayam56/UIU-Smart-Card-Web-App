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
  $role=$_SESSION["role"];
  $photo=$_SESSION["photo"];


  $_SESSION["role"]=$role;
   $_SESSION["id"]=$v_id;

  /*DB connect*/
  try{
        $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
        echo "<script>console.log('connection successful');</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<script>window.alert('connection error');</script>";
    }


 

$bytes = random_bytes(15);

$token= bin2hex($bytes);

 

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
          <a href="vendor_profile.php" class="userName">
          <?php echo"$v_name"; ?>
          </a>

        <li><a href="vendor_profile.php">
          <img src="<?php echo $photo ?>">
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
      <button id="myBtn" class="addBTN" style="vertical-align:middle" onclick="addModal();">Add Items</button>

      <button class="cartBTN" id="cartBTN" style="vertical-align:middle" onclick="cartModal();"><i class="fas fa-cart-plus"></i></button>

     <table class="table" style="width: 85%; margin: auto;  ">
                <thead class="thead-dark" style="text-align: center;">

                  <tr>
                    <th width="2%">Item No.</th>
                    <th width="16%">Item Name</th>
                    <th width="18%">Unit Price</th>
                    <th width="16%">Quantity</th>
                    <th width="16%">Update QTY</th>
                    <th width="16%">Delete</th>
                    <th width="16%">Add To Sale</th>
                  </tr>
                  
                </thead>
            
          
              
                <tbody class="table" style="color: black;">
                  <?php

                  $count = 1;
                  $sql= "SELECT * FROM item_list where vendor_id= '".$v_id."' ORDER BY item_name";
                  $obj = $conn->query($sql);

                  if ($obj -> rowCount() == 0) {
                    #table is empty as in to room available
                    ?>
                      <tr>
                        <td colspan="7" style="text-align: center;">NOTHING TO SHOW</td>
                      </tr>
                    <?php
                  }else
                  {

                    $table1 = $obj->fetchAll();

                    foreach ($table1 as $val) {
                   
                      ?>
                      
                      <tr style="border-bottom: 2px solid black; text-align:center; font-size: 20px; color: black;" id="trID_<?php echo $val[0]; ?>">

                        <td width="2%"><?php echo $count ?></td> 

                        
                        <td width="16%"><?php echo $val[1] ?></td>

                        <td width="18%"><?php echo $val[2] ?> tk</td>

                        <td width="16%" id="qty_<?php echo $val[0]; ?>" value="<?php echo $val[4]; ?>"><?php echo $val[4] ?></td>


                        <td width="16%">

                          <div class="">
                              <input type="text" class="upQTY" id="inputQTY_<?php echo $val[0]; ?>" name="input_QTY" placeholder="Quantity" required>

                          </div>
                        

                           <button type="button" class="editBTN upBTN" id="upBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="updateQTY(<?php echo $val[0]; ?>, <?php echo $count; ?>);">Update</button>

                        </td>


                        <td width="16%">
                        
                           <button type="button" class="editBTN" id="delBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="confirmModal(<?php echo $val[0]; ?>);">Delete</button>

                        </td>

                        <td width="16%">

                           <button type="button" class="editBTN" id="addBTN_<?php echo $val[0]; ?>" style="vertical-align: middle;" onclick="sale(<?php echo $val[0]; ?>);" >Add</button>

                        </td>
                        <?php $count++; ?>
                      </tr>
                      <?php
                      
                    }/*foreach ends here*/
                  }

                  ?>

                </tbody>
              

              </table>









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
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">


      <h5>⇝ Add New Item To The Menu - <h5>
           <!-- form here -->
            <form action="addItem.php" method="post">
      <div class="inputBox">
      <!-- here goes the input types -->
      
        <div class="textbox">
                  <i class="fas fa-utensils"></i>
                  <input type="text" name="item_name" placeholder="Item Name" required>
                </div>

                <div class="textbox">
                  <i class="fas fa-dollar-sign"></i>
                  <input type="text" name="unit_price" placeholder="Unit Price" required>
              </div>

              <div class="textbox">
                  <i class="fas fa-layer-group"></i>
                  <input type="text" name="item_qty" placeholder="Quantity" required>
              </div>

              <input type="hidden" name="vendor_id" value="<?php echo $v_id; ?>">   

      </div><!-- inputBox -->

      

      <button type="submit" class="modalAddBTN">Add Items</button>

      </form>

 


  <h3 style="text-align:center; color: red;" > Thank You <h3>
      
    </div>
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- mymodal ends -->



<div id="confirmModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close newClose">&times;</span>
      
    </div>
    <div class="modal-body">
    <h1>Are You Sure You Want to Delete This Item?</h1>

    <div id="ajaxRes"></div>


    <button id="confirmDel" onclick="deleteItem();">
      YES
    </button>

    <button id="cancelDel" onclick="hideConfirmModal();">NO</button>     
    </div>
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- confirm Modal ends -->









<div id="cartModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close cartClose">&times;</span>
      
    </div>
    <div class="modal-body">
    <h1>Items:</h1>

    <div id="ajaxCart">

    </div>
      
    </div>
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- cartModal ends -->





<div id="finalModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close finalClose">&times;</span>
      
    </div>
    <div class="modal-body">
    <h1>Waiting For Payment</h1>

    <div id="paymentAnim">
      <img src="res/payment/waiting.gif" style="text-align: center; margin-left: 25%;">
    </div>
      <div id="r_tag">
        
      </div>
    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- finalModal ends -->





<!-- modal ends -->



<script>

var itemId;
var v_id = "<?php echo $v_id ?>";
var token = "<?php echo $token ?>";
var total_price;

function addModal(){

  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


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


}/*add modal ends*/


function updateQTY(id,count){
itemId = id;

var qty_val = document.getElementById('inputQTY_'+id).value;

if (qty_val === '') {
  qty_val = 0;
}

var qty = document.querySelector('#qty_'+id).getAttribute('value');

/*console.log('qty update for '+itemId+' is : '+qty_val+' prev qty is: '+qty+'count is : '+count);*/


  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxItemUpdate.php?item_id="+itemId+'&v_id='+v_id+'&qty_val='+qty_val+'&qty='+qty+'&count='+count ); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('trID_'+id);
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();


} /*update QTY ends*/



function saleQTY_update(id,count,prev_saleQTY){

  var saleQTY =  document.getElementById('inputSaleQTY_'+id).value;

if (saleQTY === '') {
  saleQTY = 1;
}

  
console.log('saleqty update for item_id '+id+' is : '+saleQTY+' count is : '+count);

var divelm=document.getElementById('saletrID_'+id);

console.log(divelm);


 var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxSaleItemUpdate.php?item_id="+id+'&v_id='+v_id+'&saleQTY='+saleQTY+'&prev_saleQTY='+prev_saleQTY+'&count='+count+'&token='+token ); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('saletrID_'+id);
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();



} /*saleqty_update ends*/



function confirmModal(id){

itemId = id;

/*console.log(itemId);*/
    // Get the modal
var modal1 = document.getElementById("confirmModal");

// Get the button that opens the modal
var btn1 = document.getElementById("delBTN_"+id);

/*console.log(btn1);*/

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("newClose")[0];

// When the user clicks the button, open the modal 

  modal1.style.display = "block";


// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}


} /*confirm modal ends*/


function hideConfirmModal(){

   document.getElementById("confirmModal").style.display = "none";
}


function deleteItem(){

  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxItemDel.php?item_id="+itemId+'&v_id='+v_id ); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('ajaxRes');
              
              
               divelm.innerHTML=response;
         
               $('#trID_'+itemId).hide("slow");
               
          }
  }
  
  ajaxreq.send();


          document.getElementById("confirmModal").style.display = "none";

}


function finalize(final_price){
  var modal = document.getElementById("finalModal");

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


total_price = final_price;

ajaxInsertPayment();



}


function cartModal(){


    // Get the modal
var modal = document.getElementById("cartModal");

// Get the button that opens the modal
var btn = document.getElementById("cartBTN");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("cartClose")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxViewCart.php?&v_id="+v_id+'&token='+token); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('ajaxCart');
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();


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

}



function sale(id){

  /*console.log(token);*/
  
  $('#addBTN_'+id).css("background","linear-gradient(to top right, #FFBF00 0%, #F05E23 50%)");

  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxSale.php?item_id="+id+'&v_id='+v_id+'&token='+token); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
             /*  var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('ajaxCart');
              
              
               divelm.innerHTML=response;
         */
               
          }
  }
  
  ajaxreq.send();

}


function ajaxInsertPayment(){

  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxInsertPayment.php?v_id="+v_id+'&token='+token+'&total_price='+total_price); 

/*
  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               
          }
  }
  */
  ajaxreq.send();



  var refresh = setInterval(ajaxCheckPayment,1000);
}


function ajaxCheckPayment(){
  console.log('total price: '+total_price);
  

  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxCheckPayment.php?v_id="+v_id+'&token='+token+'&total_price='+total_price); 



  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {

             var response=ajaxreq.responseText;

              if (response.includes("redirect") ) {
                  window.location.replace("finalizePayment.php?vendor_id="+v_id+'&tr_id='+token+'&total_price='+total_price);
                }
              
            
               
          }
  }
  


  ajaxreq.send();




}






  </script>


  
</body>
</html>