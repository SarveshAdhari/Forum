<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>


<!-- Modal -->
<div class="modal fade" id="deleteCommModal" tabindex="-1" aria-labelledby="deleteCommModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCommModalLabel">Delete Comment?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        You are about to delete this post permanently.<br>
        Are you sure you want to proceed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post" action="/forum/partials/_handleDeleteComm.php">
        <button type="button" class="btn btn-danger">Delete Comment</button>
      </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>