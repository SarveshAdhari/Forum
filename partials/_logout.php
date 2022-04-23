<?php
session_start();
echo '<div class="alert alert-success alert-warning fade show my-0" role="alert">
		You are being logged out of your account.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

session_unset();
session_destroy();

header("location: /forum/welcome.php");

exit;

?>