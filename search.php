<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Forum23</title>
    <link rel="icon" href="forumlogo.png" type="image/icon type">
    <script src="https://www.google.com/recaptcha/api.js"></script>

  </head>
  <body>
    <?php include "partials/_header.php" ?>
    <?php include "partials/_dbconnect.php" ?>

    <!-- Search results start here -->

    <?php 
    $noResult = true;
      $search = $_GET['search'];
      $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title,thread_description) against ('$search')";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      echo '<div class="container my-4 mb-3">
                <h1 class="text-center my-3">'. $num .' search results for <em>"'. $_GET['search'] .'"</em></h1>';
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        echo '<div class="result my-4 alert alert-secondary">
                    <h3><a href="/forum/threads.php?threadid='.$id.'" class="text-dark"> '. $row['thread_title'] .'</a></h3>
                    <p>'. $row['thread_description'] .'</p></div>';
      }
      if(!$noResult && $num<5){
        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
      }
      echo '</div>';

      if($noResult){
        echo '<div class="container my-4 py-4">
       <div class="alert alert-secondary" role="alert">
         <p><h2 class="my-3">No matches found for '. $_GET['search'] .'</h2></p>
         <hr>
         <p class="my-4"> Suggestions:
         <ul>
         <li>Make sure that all words are spelled correctly.</li>
         <li>Try different keywords.</li>
         <li>Try more general keywords.</li>
         </ul>
         </p>
       </div>
     </div>
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

      }

    ?>    


    

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