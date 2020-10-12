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
         document.getElementById('live').style.display = 'none';
      });
      $(".wallet").click(function(){
         $(".wallet").addClass("active");
         $(".catalog").removeClass("active");
         $(".live").removeClass("active");
         document.getElementById('wallet').style.display = 'inline';
         document.getElementById('catalog').style.display = 'none';
         document.getElementById('live').style.display = 'none';
      });

      $(".live").click(function(){
        $(".live").addClass("active");
        $(".catalog").removeClass("active");
        $(".wallet").removeClass("active");
        document.getElementById('live').style.display = 'inline';
        document.getElementById('catalog').style.display = 'none';
        document.getElementById('wallet').style.display = 'none';
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
  $sec_name;
  $c_name;
 $prsntSecNameNew;

  $_SESSION["role"]=$role;
   $_SESSION["id"]=$t_id;

  date_default_timezone_set('Asia/Dhaka'); 
  $curdate = date("Y-m-d"); //contains current date in the given format

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
          <span class="icon"><i class="fas fa-university"></i></span>
          <span class="title">Courses</span></a></li>

        <li><a href="#" class="wallet">
          <span class="icon"><i class="fas fa-wallet"></i></span>
          <span class="title">Wallet</span>
          </a></li>

          <li><a href="#" class="live">
          <span class="icon"><i class="fas fa-stream"></i></span>
          <span class="title">Live Attendance</span>
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
                    <th width="25%">Vendor Name</th>
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
                        <td colspan="4" style="text-align: center;">NOTHING TO SHOW</td>
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

    
  <div class="item" id="live">

      <h1 style="color: green; margin-left: 2vw;">Today's Classes:</h1>

       <?php

        try{

          $query = "SELECT c_code FROM teacherjcourse WHERE t_id='$t_id' ";
          $cobj = $conn->query($query);

          if ($cobj->rowCount() == 0) {
            ?>

            <h1>No Courses Taken This Trimester</h1>

            <?php
          } /*if ends*/

          else{

          $ctable = $cobj->fetchAll();

          foreach ($ctable as $c_code) {

          $sec_nameqry = "SELECT sec_name FROM section WHERE c_code='".$c_code[0]."' AND t_id='$t_id' ";
          $sec_nameobj = $conn->query($sec_nameqry);
          $sec_nametab = $sec_nameobj->fetchAll();

          foreach ($sec_nametab as $sec_name) {

            try {
              $prsntCourseQry= "SELECT sec_name From classdate where sec_name='$sec_name[0]' and date='$curdate' ";
              $prsntCourseObj = $conn->query($prsntCourseQry);

              $prsntCourseTab= $prsntCourseObj->fetchAll();

              foreach ($prsntCourseTab as $prsntSecName) {
              $c_nameqry = "SELECT c_name FROM course WHERE c_code='".$c_code[0]."' ";
              $c_nameobj = $conn->query($c_nameqry);
              $c_nametable = $c_nameobj->fetchAll();
              foreach ($c_nametable as $c_name ) {
                  ?>

                <div class="cards">
                
                <h3><?php echo $prsntSecName[0]; ?></h3>

                <h4><?php echo $c_name[0]; ?></h4>

                <?php 
                $prsntSecNameNew=  str_replace(" ","_","$prsntSecName[0]"); 
                
                  ?>

                <button id="initBTN_<?php echo $prsntSecNameNew; ?>" onclick="initAtt('<?php echo $prsntSecNameNew; ?>' , '<?php echo $t_id?>');">INITIATE ATTENDANCE</button>
              </div> <!-- cards end -->

                <?php

              } /*inner inner  card foreach ends*/
                
              }


            } catch (PDOException $es) {
              echo $es;
            }

            
           

          } /*inner foreach*/


         
            
          } /*outer for each*/

        }/*else ends*/

        }catch(PDOException $e){

          echo $e;
        }/*catch ends*/

      ?>

      
    </div> <!-- live attendance DIV -->

  </div><!-- main container -->







</div> <!-- wrappper -->


<!-- The Modal -->

<div id="detailsModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close detailsClose">&times;</span>
      
    </div>
    <div class="modal-body">
      
     <div id="courseDetailsModal">
       
     </div>

    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- detailsModal ends -->




<div id="recViewModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close recClose">&times;</span>
      
    </div>
    <div class="modal-body">
      
     <div id="recViewAtt">
       
     </div>

    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- detailsModal ends -->



<div id="addAttModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close addAttClose">&times;</span>
      
    </div>
    <div class="modal-body">
           <!-- form here -->

             <div class="inputBox">
      <!-- here goes the input types -->
      
        <div class="textbox">

          <h5 style="margin-bottom: 50px;">⇝ Enter Student ID To Add - <h5>
                  <i class="fas fa-id-badge"></i>
                  <input type="text" name="item_name" id="sidInput" placeholder="Student ID" required>
                </div>

  

      </div><!-- inputBox -->

      

      <button type="submit" class="modalAddBTN" style="width: 300px; margin-left: 30vw;" id="sidAddAtt" onclick="sidInsert();">Add Attendance</button>


      <div id="testDiv">
        
      </div>



    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- addAttModal ends -->





<div id="initAttModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div id="animation" >
    <div class="modal-header">
      <span class="close initAttClose">&times;</span>
      
    </div>
    <div class="modal-body">
      
     <div id="initAttBody">

      <div id="testCheckBox">
        
      </div>

        <div id="ajaxLiveAtt">
          
        </div>

      

     </div>

    </div> <!-- modal body ends -->
    <div class="modal-footer">

      
       </div><!-- animation -->
    </div>
  </div>

</div> <!-- detailsModal ends -->





<!-- modal ends -->



<script>
  var t_id = "<?php echo $t_id ?>" ;
  var initiate='true';
  var refresh;

  var bugFix_sec_name='';
  var bugFix_t_id='';
  var bugFix_date='';

  function courseDetails(sec_name, c_name){

     // Get the modal
var modal1 = document.getElementById("detailsModal");

// Get the button that opens the modal
var btn1 = document.getElementById("detailsBTN_"+sec_name);

/*console.log(btn1);*/

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("detailsClose")[0];

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


  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxCourseDetails.php?&sec_name="+sec_name+'&c_name='+c_name+'&t_id='+t_id); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('courseDetailsModal');
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();

  } /*course details ends*/



  function recView(date,sec_name){

    console.log(date, sec_name);

         // Get the modal
var modal1 = document.getElementById("recViewModal");

// Get the button that opens the modal
var btn1 = document.getElementById("btn_"+date);

/*console.log(btn1);*/

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("recClose")[0];

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



var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxViewRecAtt.php?&sec_name="+sec_name+'&date='+date+'&t_id='+t_id); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('recViewAtt');
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();



  } /*rec view ends*/





  function removeAtt(sid,cdate,sec_name){


  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxRemoveAtt.php?&sec_name="+sec_name+'&cdate='+cdate+'&s_id='+sid); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               $('#tr_'+sid).hide('slow');
               
          }
  }
  
  ajaxreq.send();

  } /*remove att ends here*/






function addAtt(sec_name,t_id,date){

  bugFix_sec_name = sec_name;
  bugFix_t_id = t_id;
  bugFix_date = date;


      // Get the modal
  var modal1 = document.getElementById("addAttModal");

  // Get the button that opens the modal
  var btn1 = document.getElementById("addAttBTN");

  /*console.log(btn1);*/

  // Get the <span> element that closes the modal
  var span1 = document.getElementsByClassName("addAttClose")[0];

  // When the user clicks the button, open the modal 

    modal1.style.display = "block";


  // When the user clicks on <span> (x), close the modal
  span1.onclick = function() {
    modal1.style.display = "none";

    $("#testDiv").html("");
    var btn = document.getElementById('sidInput').value='';
/*    $('#addAttBTN').html('');*/
/*    $().removeData();*/

    
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal1) {
      modal1.style.display = "none";
    }
  }



  } /*add att ends*/



  function sidInsert(){


   var sid= $('#sidInput').val();
/*   console.log('the params: sec_name: '+bugFix_sec_name+' t_id: '+bugFix_t_id+' date= '+bugFix_date+' s-id: '+sid);*/

 var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("POST","ajaxAddAtt.php",true); 

  ajaxreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
             var response=ajaxreq.responseText;
            
             var divelm=document.getElementById('testDiv');
            
            
             divelm.innerHTML=response;
             if (response.includes("Updated")) {

  var ajaxreq2=new XMLHttpRequest();
  ajaxreq2.open("GET","ajaxViewRecAtt.php?&sec_name="+bugFix_sec_name+'&date='+bugFix_date+'&t_id='+bugFix_t_id); 


  ajaxreq2.onreadystatechange=function ()
  {
   if(ajaxreq2.readyState==4 && ajaxreq.status==200)
          {
               var response2=ajaxreq2.responseText;
              
               var divelm2=document.getElementById('recViewAtt');
              
              
               divelm2.innerHTML=response2;
               
          }
  }
  
  ajaxreq2.send();
             }

             
          }
  }
/*  
  console.log('inside add att and sending req to ajaxAddAtt, the params: sec_name: '+sec_name+' t_id: '+t_id+' date= '+date+' s-id: '+sid);*/
    $("#testDiv").html("");
  ajaxreq.send("sec_name="+bugFix_sec_name+"&t_id="+bugFix_t_id+"&date="+bugFix_date+"&s_id="+sid); 



  }



  function initAtt(prsntSecName,t_id){

     // Get the modal
  var modal1 = document.getElementById("initAttModal");

  // Get the button that opens the modal
  var btn1 = document.getElementById("initBTN_"+prsntSecName);

  /*console.log(btn1);*/

  // Get the <span> element that closes the modal
  var span1 = document.getElementsByClassName("initAttClose")[0];

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
    
/*    var x= document.getElementById('new').id="customCheck_";

    console.log(x );
  */



  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxLiveAtt.php?&sec_name="+prsntSecName+'&t_id='+t_id+"&initiate="+initiate); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
              
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('testCheckBox');
              
              
               divelm.innerHTML=response;

               var x= document.getElementById('new').id="customCheck_"+prsntSecName;

        
                clearInterval(refresh);
                refresh = setInterval(ajaxViewLiveAtt,700,prsntSecName);

              $('#customCheck_'+prsntSecName).on('click',function(){
              if (document.getElementById('customCheck_'+prsntSecName).checked == true) {
                document.getElementById('initText').innerHTML='Attendance Sequence Initiated';
                document.getElementById('initText').style.color='green';
                document.getElementById('ajaxLiveAtt').style.display='block';

                initiate='true';
                ajaxLiveAtt('true',prsntSecName,t_id);
                

              }else{
                document.getElementById('initText').innerHTML='Attendance Sequence Stopped';
                document.getElementById('initText').style.color='red';
               /* document.getElementById('ajaxLiveAtt').style.display='none';*/

                initiate='false';
                ajaxLiveAtt('false',prsntSecName,t_id);
                ajaxAttStateDel(prsntSecName,t_id);
              }

            });
  
          }
  }
  
  ajaxreq.send();


  } /*init attendance ends*/


  function ajaxLiveAtt(init,prsntSecName,t_id){

  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxLiveAtt.php?&sec_name="+prsntSecName+'&t_id='+t_id+"&initiate="+init); 

  
  ajaxreq.send();
  initiate='true';


  clearInterval(refresh);
  refresh = setInterval(ajaxViewLiveAtt,700,prsntSecName);

  }/*ajaxliveAtt*/



  function ajaxViewLiveAtt(prsntSecName){
  console.log('checking for: '+prsntSecName);
  var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxViewLiveAtt.php?&sec_name="+prsntSecName+'&t_id='+t_id); 


  ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('ajaxLiveAtt');
              
              
               divelm.innerHTML=response;
               
          }
  }
  
  ajaxreq.send();

  } /*ajaxViewLiveAtt*/

  function ajaxAttStateDel(prsntSecName,t_id){

    var ajaxreq=new XMLHttpRequest();
  ajaxreq.open("GET","ajaxAttStateDel.php?&sec_name="+prsntSecName+'&t_id='+t_id); 

/*   ajaxreq.onreadystatechange=function ()
  {
   if(ajaxreq.readyState==4 && ajaxreq.status==200)
          {
               var response=ajaxreq.responseText;
              
               var divelm=document.getElementById('testCheckBox');
              
                 console.log('trying to delete');
               divelm.innerHTML=response;
               
          }
  }*/
  

  
  ajaxreq.send();

  }


  </script>


  
</body>
</html>