<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for a Forum23 account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container my-3">
          <form class="row g-3" action="/forum/partials/_handleSignup.php" method="post">
            <div class="row mt-3">
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="email" class="form-control" id="email" name="email" maxlength="30" required placeholder="email@email.com">
              </div>
              <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="text" class="form-control" id="username" name="username" maxlength="30" required placeholder="username">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 my-2">
                <label for="password" class="form-label">Password</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="password" class="form-control" id="password" name="password" maxlength="30" required placeholder="****">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 my-2">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <i class="fa fa-asterisk" style="font-size:18px;color:red">*</i>
                <input type="password" class="form-control" id="cpassword" name="cpassword" maxlength="30" required placeholder="****">
              </div>
              <div class="g-recaptcha" id="recaptcha" data-sitekey="6LeMBAwdAAAAAOpmKCeDSiFCrpHSfFv5de6qJHZ_"></div>
              <div class="mt-2">
                <input type="checkbox" name="policy" required>
                <small>
                  I accept the user policies and guidelines.
                </small>  
              </div>
            </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign up</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>