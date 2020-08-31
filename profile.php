<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Profile</title>
  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="icon" href="res/logo.ico">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  
  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
         $(".wrapper").toggleClass("collapse");
      });

      $(".books").click(function(){
         $(".books").toggleClass("active");
      });
    });
  </script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">PROFILE PAGE</div>
      <ul>
        <!-- <li><a href="#">
          <i class="fas fa-search"></i></a></li>
        <li><a href="#">
          <i class="fas fa-bell"></i>
          </a></li> -->
          <a href="#" class="userName">
          Ali Iktider Sayam <!-- php theke naam anba ekhane -->
          </a>

        <li><a href="profile.php">
          <i class="fas fa-user"></i>
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="#" onclick="linkClick(books);" class="books">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Books</span></a></li>
        <li><a href="#" onclick="linkClick(movies);" class="movies">
          <span class="icon"><i class="fas fa-file-video"></i></span>
          <span class="title">Movies</span>
          </a></li>
        <li><a href="#" onclick="linkClick(sports);">
          <span class="icon"><i class="fas fa-volleyball-ball"></i></span>
          <span class="title">Sports</span>
          </a></li>
        <li><a href="#" onclick="linkClick(blogs); ">
          <span class="icon"><i class="fas fa-blog"></i></span>
          <span class="title">Blogs</span>
          </a></li>
        <li><a href="#" onclick="linkClick(nature);">
          <span class="icon"><i class="fas fa-leaf"></i></span>
          <span class="title">Nature</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container" >
    <div class="item" id="books">
     this is books text
   </div>
    <div class="item" id="movies">
      this is movies text
    </div>
    <div class="item" id="sports">
      this is sports text
    </div>
    <div class="item" id="blogs">
      Lthis is item text
    </div>
  </div>





</div>



<script>
   function linkClick(id){
    console.log(id);

    if (id.style.display == 'inline') {
        id.style.display = 'none';
       

      }else{
        id.style.display = 'inline';
        id.style.width = '50px';
       
      }
   }

  </script>
  
</body>
</html>