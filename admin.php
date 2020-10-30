<?php
  session_start();
  $su_name=$_SESSION["su_name"];
?>

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
  <script src="js/add_student.js"></script>
  <script src="js/studentHandler.js"></script>
  <script src="js/teacherHandler.js"></script>
  <script src="js/courseHandler.js"></script>
  <script src="js/vendorHandler.js"></script>

  

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

    //code added//
    window.onclick = function(event) {
  if (event.target == detailsmodal) {
    detailsmodal.style.display = "none";
    

  }
  if (event.target == detailsmodalTeacher) {
    detailsmodalTeacher.style.display = "none";
    

  }
  if (event.target == detailsmodalCourse) {
    detailsmodalCourse.style.display = "none";
    

  }
  if (event.target == detailsmodalVendor) {
    detailsmodalVendor.style.display = "none";
    

  }
  if (event.target == viewStudentmodal) {
    viewStudentmodal.style.display = "none";
    

  }
  if (event.target == viewTeachermodal) {
    viewTeachermodal.style.display = "none";
    

  }
  if (event.target == viewCoursemodal) {
    viewCoursemodal.style.display = "none";
    

  }
  if (event.target == viewVendormodal) {
    viewVendormodal.style.display = "none";
    

  }
  if (event.target == updateStudentmodal) {
    updateStudentmodal.style.display = "none";
    

  }
  if (event.target == updateTeachermodal) {
    updateTeachermodal.style.display = "none";
    

  }
  if (event.target == updateCoursemodal) {
    updateCoursemodal.style.display = "none";
    

  }
  if (event.target == updateVendormodal) {
    updateVendormodal.style.display = "none";
    

  }
  if (event.target == assignSection_Studentmodal) {
    assignSection_Studentmodal.style.display = "none";
    

  }
  if (event.target == assignSection_Coursemodal) {
    assignSection_Coursemodal.style.display = "none";
    

  }
}
  

    function modalActive(){
      document.getElementById('detailsmodal').style.display='block';//displaying modal of add new student
    }
    function modalActiveTeacher(){
      document.getElementById('detailsmodalTeacher').style.display='block';//displaying modal of add new teacher
    }
    function modalActiveCourse(){
      document.getElementById('detailsmodalCourse').style.display='block';//displaying modal of add new teacher
    }
    function modalActiveVendor(){
      document.getElementById('detailsmodalVendor').style.display='block';//displaying modal of add new teacher
    }

    function filter (param)
    {
      if(param==0)
      {
        var search = document.getElementById('search_field_student').value;
        if(search!="")
        {var char=search[0];search=char.toUpperCase()+search.substr(1);}

      }
      else if(param==1)
      {
        var search = document.getElementById('search_field_teacher').value;
        if(search!="")
        {

          var char=search[0];

          search=char.toUpperCase()+search.substr(1);
          
        }
      }

      else if(param==2)
      {
        var search = document.getElementById('search_field_course').value;
        if(search!="")
        {

          var char=search[0];

          search=char.toUpperCase()+search.substr(1);
          
        }
      }
      else if(param==3)
      {
        var search = document.getElementById('search_field_vendor').value;
        if(search!="")
        {

          var char=search[0];

          search=char.toUpperCase()+search.substr(1);
          
        }
        
      }
      
      
    
      
       
       var x = document.getElementsByClassName("item_content");
       var c=x[param].children;
       for(i=0;i<c.length-1;i++)
       {
         if(c[i].id.includes(search)==true|| c[i].outerText.includes(search)==true)
         {

           
           c[i].style.display="flex";
         }
         else{
           c[i].style.display="none";
         }
       }
       
      
    }
  </script>
</head>
<?php
  if (isset($su_name)) {
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
      <div class="item_header">
      
      <h1>Students</h1>
      <input type="text" placeholder="Search student" id="search_field_student" onkeyup="filter(0)">
      </div>
      <div class="item_content">
        <?php
        try{
          $sqlquery="SELECT * FROM `student`";
          $pdostmt=$conn->query($sqlquery);
          if($pdostmt->rowCount()>0)
          {
            $table=$pdostmt->fetchAll();
            foreach($table as $key)
            {
              
              ?>
               <div class="cardss" id="<?php echo $key[0]?>">
        <div class="cards_content">
        <img src="<?php echo $key['s_photo']?>" alt="user.png">
        <div class="details">
    
             <h3><?php echo $key['s_name']?></h3>
            <h4><?php echo $key['s_id']?></h4>
        </div>
        <div class="icons">
          <span class="icon_cards" id="trash.<?php echo $key[0]?>" onclick="del_student(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></i></span>
          <span class="icon_cards" id="update.<?php echo $key[0]?>" onclick="update_student(this.id)"><i class="fa fa-cog" aria-hidden="true"></i></span>
          <span class="icon_cards"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
        </div>
        </div>
        <button id ="detailsBTN.<?php echo $key[0]?>"onclick="details_student(this.id)">Details</button> 
       </div>

              <?php
            }
          }

        }
        catch(PDOException $ex)
        {
          echo ("query error");
        }
        
        
        
        
        ?>
      
    

     
      <div class="cards_addstudent" id="add_student" onclick="modalActive()">
        
        <img src="user.png" alt="none">
        
    
             <h3>Add new student</h3>
            
        
       
        </div>
         
      
       
       
       </div>
       

      

     
      

     
     
      


   </div> <!-- student div ends-->




    <div class="item" id="wallet">

    <div class="item_header">
      
      <h1>Teachers</h1>
      <input type="text" placeholder="Search Teacher" id="search_field_teacher" onkeyup="filter(1)">
      </div>
      <div class="item_content">
        <?php
        try{
          $sqlquery="SELECT * FROM `teacher`";
          $pdostmt=$conn->query($sqlquery);
          if($pdostmt->rowCount()>0)
          {
            $table=$pdostmt->fetchAll();
            foreach($table as $key)
            {
              
              ?>
               <div class="cardss" id="<?php echo $key[0]?>">
        <div class="cards_content">
        <img src="<?php echo $key['t_photo']?>" alt="user.png">
        <div class="details">
    
             <h3><?php echo $key['t_name']?></h3>
            <h4><?php echo $key['t_id']?></h4>
        </div>
        <div class="icons">
          <span class="icon_cards" id="trash.<?php echo $key[0]?>" onclick="del_teacher(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></i></span>
          <span class="icon_cards" id="update.<?php echo $key[0]?>" onclick="update_teacher(this.id)"><i class="fa fa-cog" aria-hidden="true"></i></span>
          <span class="icon_cards"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
        </div>
        </div>
        <button id ="detailsBTN.<?php echo $key[0]?>"onclick="details_teacher(this.id)">Details</button> 
       </div>

              <?php
            }
          }

        }
        catch(PDOException $ex)
        {
          echo ("query error");
        }
        
        
        
        
        ?>
      
    

     
      <div class="cards_addstudent" id="add_student" onclick="modalActiveTeacher()">
        
        <img src="user.png" alt="none">
        
    
             <h3>Add New Teacher</h3>
            
        
       
        </div>
         
      
       
       
       </div>
       


    </div> <!-- wallet div ends -->


     <div class="item" id="courses">

    
     <div class="item_header">
      
      <h1>Courses</h1>
      <input type="text" placeholder="Search Course" id="search_field_course" onkeyup="filter(2)">
      </div>
      <div class="item_content">
        <?php
        try{
          $sqlquery="SELECT * FROM `course`";
          $pdostmt=$conn->query($sqlquery);
          if($pdostmt->rowCount()>0)
          {
            $table=$pdostmt->fetchAll();
            foreach($table as $key)
            {
              
              ?>
               <div class="cardss" id="<?php echo $key[0]?>">
        <div class="cards_content">
        
        <div class="details">
    
             <h3><?php echo $key['c_name']?></h3>
            <h4><?php echo $key['c_code']?></h4>
        </div>
        <div class="icons">
          <span class="icon_cards" id="trash.<?php echo $key[0]?>" onclick="del_course(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></i></span>
          <span class="icon_cards" id="update.<?php echo $key[0]?>" onclick="update_course(this.id)"><i class="fa fa-cog" aria-hidden="true"></i></span>
          
        </div>
        </div>
         <button id ="detailsBTN.<?php echo $key[0]?>"onclick="details_course(this.id)">Details</button> 
       </div>

              <?php
            }
          }

        }
        catch(PDOException $ex)
        {
          echo ("query error");
        }
        
        
        
        
        ?>
      
    

     
      <div class="cards_addstudent" id="add_student" onclick="modalActiveCourse()">
        
        <img src="user.png" alt="none">
        
    
             <h3>Add New Course</h3>
            
        
       
        </div>
         
      
       
       
       </div>
       
      
    </div> <!-- live attendance DIV -->



    
  <div class="item" id="live">

  <div class="item_header">
      
      <h1>Vendors</h1>
      <input type="text" placeholder="Search Vendor" id="search_field_vendor" onkeyup="filter(3)">
      </div>
      <div class="item_content">
        <?php
        try{
          $sqlquery="SELECT * FROM `vendor`";
          $pdostmt=$conn->query($sqlquery);
          if($pdostmt->rowCount()>0)
          {
            $table=$pdostmt->fetchAll();
            foreach($table as $key)
            {
              
              ?>
               <div class="cardss" id="<?php echo $key[1]?>">
        <div class="cards_content">
        
        <div class="details">
    
             <h3><?php echo $key['vendor_name']?></h3>
            <h4>Vendor ID: <?php echo $key['vendor_id']?></h4>
        </div>
        <div class="icons">
          <span class="icon_cards" id="trash.<?php echo $key[1]?>" onclick="del_vendor(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></i></span>
          <span class="icon_cards" id="update.<?php echo $key[1]?>" onclick="update_vendor(this.id)"><i class="fa fa-cog" aria-hidden="true"></i></span>
          
        </div>
        </div>
        <button id ="detailsBTN.<?php echo $key[1]?>"onclick="details_vendor(this.id)">Details</button> 
       </div>

              <?php
            }
          }

        }
        catch(PDOException $ex)
        {
          echo ("query error");
        }
        
        
        
        
        ?>
      
    

     
      <div class="cards_addstudent" id="add_student" onclick="modalActiveVendor()">
        
        <img src="user.png" alt="none">
        
    
             <h3>Add New Vendor</h3>
            
        
       
        </div>
         
      
       
       
       </div>
       




</div> <!-- wrappper -->
</div>


<!-- The Modal -->
<div class="modal" id="detailsmodal">
  <div class="modal-content">
    <div class="modal-body">
      
        <h4>Student ID:</h4><input class="inputbox" id="s_id" type="text">
        <h4>RFID Tag:</h4><input class="inputbox" id="s_tag" type="text">
        <h4>Student Name:</h4> <input class="inputbox" id="s_name" type="text">
        <h4>Email :</h4><input class="inputbox" id="s_email" type="email">
        <h4>Password:</h4><input class="inputbox" id="s_password" type="text">
        <h4>Department:</h4><input class="inputbox" id="s_department" type="text">
        <h4>Batch:</h4><input class="inputbox" id="s_batch" type="text">
        <h4>Phone:</h4><input class="inputbox" id="s_phone" type="text">
        <h4>Running Trimester:</h4><input class="inputbox" id="running_trimester" type="text">
        
      
      <button class="newModalbtn" onclick="add_student()">Add Student</button>
    </div>
  </div>
</div>
<div class="modal" id="detailsmodalTeacher">
  <div class="modal-content">
    <div class="modal-body">
      
        <h4>Teacher ID:</h4> <input class="inputbox" id="t_id" type="text">
        <h4>RFID Tag:</h4> <input class="inputbox" id="t_tag" type="text">
        <h4>Teacher Name:</h4> <input class="inputbox" id="t_name" type="text">
        <h4>Email :</h4> <input class="inputbox" id="t_email" type="email">
        <h4>Password:</h4> <input class="inputbox" id="t_password" type="text">
        <h4>Department:</h4><input class="inputbox" id="t_department" type="text">
        <h4>Phone:</h4><input class="inputbox" id="t_phone" type="text">
        
        
      
      <button class="newModalbtn" onclick="add_teacher()">Add Teacher</button>
    </div>
  </div>
</div>
<div class="modal" id="detailsmodalCourse">
  <div class="modal-content">
    <div class="modal-body">
      
    <h4>Course code:</h4> <input class="inputbox" id="c_code" type="text">
    <h4>Course Name:</h4> <input class="inputbox" id="c_name" type="text">
        
        
      
      <button class="newModalbtn" onclick="add_course()">Add Course</button>
    </div>
  </div>
</div>

<div class="modal" id="detailsmodalVendor">
  <div class="modal-content">
    <div class="modal-body">
      
    <h4>Vendor Reader Tag : <input class="inputbox" id="v_reader" type="text">
        
    <h4>Vendor Name:</h4> <input class="inputbox" id="vendor_name" type="text">
    <h4>Vendor User ID :</h4> <input class="inputbox" id="vendor_uid" type="email">
    <h4>Vendor Password:</h4> <input class="inputbox" id="vendor_password" type="text">
    <h4>Email:</h4><input class="inputbox" id="vendor_email" type="text">
        
    <h4>Phone:</h4><input class="inputbox" id="vendor_phone" type="text">
        
        
        
      
      <button class="newModalbtn" onclick="add_vendor()">Add Vendor</button>
    </div>
  </div>
</div>

<div class="modal" id="viewStudentmodal">
  
</div>

<div class="modal" id="viewCoursemodal">
  
</div>
<div class="modal" id="viewVendormodal">
  
</div>
<div class="modal" id="viewTeachermodal">
  
</div>
<div class="modal" id="updateStudentmodal">
  
</div>
<div class="modal" id="updateTeachermodal">
  
</div>
<div class="modal" id="updateCoursemodal">
  
</div>
<div class="modal" id="updateVendormodal">
  
</div>
<div class="modal" id="assignSection_Studentmodal">
  
</div>

<div class="modal" id="assignSection_Coursemodal">
  
      </div>








<!-- modal ends -->



<script>





  </script>


  
</body>
</html>