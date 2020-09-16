<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="RFID Based Smart Card System">
  <meta name="keywords" content="RFID,Smart,Card">
  <title>UIU Smart Card-Profile</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="icon" href="res/logo.ico">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<?php
      session_start();

    /*DB connect*/
  try{
        $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
        echo "<script>console.log('connection successful');</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<script>window.alert('connection error');</script>";
    }

  $role=$_SESSION["role"];
  $id=$_SESSION["id"];

  $name;
  $photo;
  $dept;
  $tag;
  $email;
  $phone;
  $batch='';

  if ($role == 'student') {

    //write the things here
    
    try{
            $sqlquery="SELECT * from student where s_id= '".$id."'  ";
            $object= $conn->query($sqlquery);
            $row1= $object->fetchAll();

            foreach ($row1 as $key) {
                        $name= $key[2];
                        $photo= $key[8];
                        $tag= $key[1];
                        $email= $key[3];
                        $phone= $key[7];
                        $dept= $key[5];
                        $batch = $key[6];
                          break;
                        }        
                }

                catch(PDOException $e){
                    echo $e;
                }


  }else{
    try{
        $sqlquery="SELECT * from teacher where t_id= '".$id."'  ";
            $object= $conn->query($sqlquery);
            $row1= $object->fetchAll();

            foreach ($row1 as $key) {
                        $name= $key[2];
                        $photo= $key[7];
                        $tag= $key[1];
                        $email= $key[3];
                        $phone= $key[6];
                        $dept= $key[5];
                        }        
                

    }catch(PDOException $e){
      echo $e;
    }

  }
?>

<body>

  <div class="container">
    <div class="topbar">
      <span class="left elementAnimLeft">
        <h1>Profile</h1>
      </span>

      <span class="mid">
        <h1> UIU SMART CARD </h1>
      </span>

      <span class="right">
        <button class="backBTN elementAnim" onclick="backToDash();">Back To Dash</button>
      </span>

    </div> <!-- topbar -->

    <div class="lowerbody">
        <span id="lowerLeft" class="elementAnimLeft">
          <img src="<?php echo $photo ?>">

          <p> <?php echo $name ?> </p>
          <?php
            if ($batch === '') {
              
            }else{
              ?>
                <p> Batch: <?php echo $batch ?> </p>
              <?php
            }
          ?>
          
        </span>

        <span id="lowerRight">
          <h1 class="elementAnim">Information</h1>
          <hr>

          <div class="info">
            <p class="elementAnim"> ID: <?php echo $id ?> </p>
            <p class="elementAnim"> Department: <?php echo $dept ?> </p>
            <p class="elementAnim"> RFID Tag: <?php echo $tag ?> </p>
            <p class="elementAnim"> Email: <?php echo $email ?> </p>
            <p class="elementAnim"> Phone: <?php echo $phone ?> </p>
          </div>
          
        </span>

    </div> <!-- lowerbody -->


  </div> <!-- container -->


<script>
  var role = "<?php echo $role ?>";
  function backToDash(){
    
    if (role == 'student') {
      window.location.replace('student_dashboard.php');
    }else{
      window.location.replace('teacher_dashboard.php');
    }

  }
</script>

  
</body>
</html>