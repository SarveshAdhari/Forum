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
      $id = $_GET['threadid'];
      $sql = "SELECT * from threads where thread_id = $id";
      $result = mysqli_query($conn,$sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $title = $row['thread_title'];
        $desc = $row['thread_description'];
        $user_id= $row['thread_user_id'];
        $sql3= "SELECT username FROM users WHERE user_id = '$user_id'";
        $result3= mysqli_query($conn,$sql3);
        $row3= mysqli_fetch_assoc($result3);
        $posted_by = $row3['username'];
      }
    
    ?>

    <?php
      $showAlert=false;
      $method = $_SERVER['REQUEST_METHOD'];
      if($method=='POST'){
        //Insert into DB
        $content = $_POST['comment'];
        $user_id = $_POST['uid'];
        $content = str_replace("<","&lt;",$content);
        $content = str_replace(">","&gt;",$content);
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$content', '$id', '$user_id', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
      }
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Your comment was successfully added!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    ?>

    <div class="container my-4">
      <div class="alert alert-danger" role="alert">
        <h1 class="alert-heading text-center my-4"><?php echo $title;?></h1>
        <p>
          <?php echo $desc;?>
          <br><br>
          <i>Posted by:</i><b> <?php echo $posted_by;?> </b><br>
        </p>
        <hr>
        <p class="mb-0">No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
      </div>
    </div>

<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

  echo '<div class="container">
          <h1>Post A Comment</h1>
          <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3 col-md-6">
              <label for="comment" class="form-label">Type your comment here</label><br>
              <textarea class="form-control" id="comment" name="comment" required></textarea>
              <input type="hidden" name="uid" value="'.$_SESSION["uid"].'">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
          </form>
        </div>';
  }
  else{
    echo '<div class="container">
            <h1>Login To Post A Comment</h1>
            <form action="<?php echo'. $_SERVER['REQUEST_URI'].'?>" method="post">
              <div class="mb-3 col-md-6">
                <label for="comment" class="form-label">Type your comment here</label><br>
                <textarea class="form-control" id="comment" name="comment" required disabled></textarea>
              </div>
              <button type="submit" class="btn btn-success" disabled>Post Comment</button>
            </form>
          </div>';
  }
?>

    <div class="container my-4">
      <h2>Discussions</h2>
    <?php
       $id = $_GET['threadid'];
       $sql = "SELECT * from comments where thread_id = $id";
       $result = mysqli_query($conn,$sql);
       $noResult = true;
       while($row = mysqli_fetch_assoc($result)){
         $noResult = false;
         $comm_id = $row['comment_id'];
         $content = $row['comment_content'];
         $comm_uid = $row['comment_by'];
         $sql3= "SELECT username FROM users WHERE user_id = '$comm_uid'";
         $result3= mysqli_query($conn,$sql3);
         $row3= mysqli_fetch_assoc($result3);

         echo'<div class="d-flex my-4">
             <div class="flex-shrink-0">
               <img src="https://source.unsplash.com/60x60/?random" alt="...">

             </div>
             <div class="flex-grow-1 ms-3">
             <small>posted by </small>
                <b>'. $row3['username'] .'</b>
                <br>
               '.$content.'<br>
               </div>
           </div>';
       }

       if($noResult){
         echo '<div class="container my-4">
       <div class="alert alert-secondary" role="alert">
         <p><h2>No comments here</h2></p>
         <hr>
         <p> Be the first one to add a comment</p>
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