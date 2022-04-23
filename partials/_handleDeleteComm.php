<?php
  
    include '_dbconnect.php';

    $thread_id = $_GET['threadid'];

    if(isset($_Post['delete']){
    echo "Button Clicked";
    } 

    $sql = "DELETE FROM threads WHERE thread_id=$thread_id";
    if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: /forum/welcome.php"); 
    } else {
    echo "Error deleting record: " . mysqli_error($conn);
    }
  mysqli_close($conn);
?>