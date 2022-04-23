<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to your Forum23 account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="row g-3" action="/forum/partials/_handleLogin.php" method="post">
            <div class="row">
              <div class="col-md-12 my-2">
                <label for="email" class="form-label">Email</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="email" class="form-control" id="email" name="email" maxlength="30" required placeholder="email@email.com">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-2">
                <label for="password" class="form-label">Password</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="password" class="form-control" id="password" name="password" maxlength="30" placeholder="****">
              </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeMBAwdAAAAAOpmKCeDSiFCrpHSfFv5de6qJHZ_">
            </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>