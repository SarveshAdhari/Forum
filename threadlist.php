<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Forum23</title>
  </head>
  <body>
    <?php include "partials/_header.php" ?>
    <?php include "partials/_dbconnect.php" ?>
    <?php
      $id = $_GET['catid'];
      $sql = "SELECT * from categories where category_id = $id";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];

      }
    ?>

    <?php
      $showAlert=false;
      $method = $_SERVER['REQUEST_METHOD'];
      if($method=='POST'){
        //Insert into DB
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $th_desc = str_replace("<","&lt;",$th_desc);
        $th_desc = str_replace(">","&gt;",$th_desc);
        $uid = $_POST['uid'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `datetime`) VALUES ('$th_title', '$th_desc', '$id', '$uid', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
      }
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Your question was successfully added!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    ?>



    <div class="container my-4">
      <div class="alert alert-primary" role="alert">
        <h1 class="alert-heading text-center my-4">Welcome to <?php echo $catname;?> forum</h1>
        <p><?php echo $catdesc;?></p>
        <hr>
        <p class="mb-0">No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
      </div>
    </div>

<?php 
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && isset($_SESSION['email'])){
    echo'<div class="container">
          <h1>Start A Discussion</h1>
          <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3 col-md-6">
              <label for="title" class="form-label">Problem Title</label>
              <input type="text" class="form-control" id="title" name="title" maxlength="255" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 col-md-6">
              <label for="desc" class="form-label">Elaborate your problem</label><br>
              <textarea class="form-control" id="desc" name="desc" required></textarea>
              <input type="hidden" name="uid" value="'.$_SESSION["uid"].'">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>';
  }
  else{
    echo'<div class="container">
          <h1>Login To Start A Discussion</h1>
          <form action="<?php echo'. $_SERVER['REQUEST_URI'].'?>" method="post">
            <div class="mb-3 col-md-6">
              <label for="title" class="form-label">Problem Title</label>
              <input type="text" class="form-control" id="title" name="title" maxlength="255" aria-describedby="emailHelp" required disabled>
            </div>
            <div class="mb-3 col-md-6">
              <label for="desc" class="form-label">Elaborate your problem</label><br>
              <textarea class="form-control" id="desc" name="desc" required disabled></textarea>
            </div>
            <button type="submit" class="btn btn-success" disabled>Submit</button>
          </form>
        </div>';
  }
?>

    <div class="container my-4">
      <h2 class="my-3">Browse Questions</h2>

      <?php
      $id = $_GET['catid'];
      $sql = "SELECT * from threads where thread_cat_id = $id";
      $result = mysqli_query($conn,$sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $thread_id = $row['thread_id'];
        $thread_title = $row['thread_title'];
        $thread_desc = $row['thread_description'];
        $th_uid= $row['thread_user_id'];
        $sql2 = "SELECT username FROM users WHERE user_id='$th_uid'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);

        echo'<div class="d-flex my-4">
            <div class="flex-shrink-0">
              <img src="https://source.unsplash.com/60x60/?random" alt="...">

            </div>
            <div class="flex-grow-1 ms-3"><small>posted by </small><b>'.$row2['username'].'</b><br>
                          <b><a href="threads.php?threadid='.$thread_id.'" class="link-secondary">'. $thread_title .'</a></b>
                          <br>
              '.$thread_desc.'
            </div>
          </div>';
      }

      if($noResult){
        echo '<div class="container my-4">
      <div class="alert alert-secondary" role="alert">
        <p><h2>No questions here</h2></p>
        <hr>
        <p> Be the first one to ask a question</p>
      </div>
    </div>';  
      }
    ?>



    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <?php include "partials/_footer.php" ?>
  </body>
</html>