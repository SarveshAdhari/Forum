<?php
  $login = false;
  $login_emailErr = false;
  $login_passErr = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    include '_dbconnect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * from users where email='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
      while($row=mysqli_fetch_assoc($result)){
        if(password_verify($password, $row['password'])){
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['uid'] = $row['user_id'];
          header("Location: /forum/welcome.php?loginsuccess=$login");

        }
        else{
          $login_passErr = true;
          header("Location: /forum/welcome.php?l_passerror=$login_passErr");
        }
      }
      
      
    }
    else{
     $login_emailErr = true;
     header("Location: /forum/welcome.php?l_emailerror=$login_emailErr");
    }
  }
?> 
