<?php

session_start();


 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum"><img src = "forumlogo.png" height=30px width=70px></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class = "nav-link" href="contacts.php">Contact</a>
        </li>
      </ul>
      <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-danger" type="submit">Search</button>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<a class="btn btn-outline-warning mx-2" href="/forum/partials/_logout.php">Logout</a> ';

}
else{
echo '  <div class="mx-2">
          <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-warning ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button> 
            <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
          </div>
        </div>
      </form>';

}



  echo  '</div>
         </div>
         </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
include 'partials/_deletecModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Your account was successfully created. Kindly login to continue.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }


if(isset($_GET['emailerror']) && $_GET['emailerror']=="1"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Email has already been used! Kindly signup with a different email.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['usererror']) && $_GET['usererror']=="1"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Username already exists! Kindly signup with a different username.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['passerror']) && $_GET['passerror']=="1"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Passwords did not match! Kindly signup again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="1" && isset($_SESSION['email'])){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          You have been successfully logged in as <b><i>'. $_SESSION['email'] .'</i></b>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['l_emailerror']) && $_GET['l_emailerror']=="1"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Email did not match! Kindly login with a valid email.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['l_passerror']) && $_GET['l_passerror']=="1"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Passwords did not match! Kindly login again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="1" && !isset($_SESSION['email'])){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>You were logged out of your previous session!</strong>  
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>