<?php
  $showAlert = false;
  $showErrUsername = false;
  $showErrEmail = false;
  $showErrPasword = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include '_dbconnect.php';

  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $email_existSql = "SELECT * from users where email = '$email'";
  $email_result = mysqli_query($conn,$email_existSql);
  $email_ExistsRows = mysqli_num_rows($email_result);
  if($email_ExistsRows>0){
    $showErrEmail = true;
    header("Location: /forum/welcome.php?emailerror=$showErrEmail");
  }
  else{
  $user_existSql = "SELECT * from users where username = '$username'";
  $user_result = mysqli_query($conn,$user_existSql);
  $user_ExistsRows = mysqli_num_rows($user_result);
  if($user_ExistsRows>0){
        $showErrUsername = true;
        header("Location: /forum/welcome.php?&usererror=$showErrUsername");
  }
   else{
       if($password == $cpassword){
          $passHash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` (`email`, `username`, `password`) VALUES ('$email', '$username', '$passHash')";
         $result = mysqli_query($conn,$sql);
         if($result){
           $showAlert = true;
           header("Location: /forum/welcome.php?signupsuccess=true");
           exit();
          }
        }
        else{
          $showErrPasword = true;
          header("Location: /forum/welcome.php?passerror=$showErrPasword");
        }
      }
    }
  }
?>
