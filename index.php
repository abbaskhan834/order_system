<?php
session_start();
// password = khan123
include 'config/conn.php';
if (isset($_POST['signin'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];

   $selectUsers = "SELECT id, email, password FROM users where email = ?;";
   $stmt = $conn->prepare($selectUsers);
   $stmt->execute([$email]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($user) {
     if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      
      header("Location: dashboard.php");
      exit;
       
     }
   }
 } 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Orders System </title>
  <!-- base:css -->
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo-dark.svg" alt="logo">
              </div>
              
  
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="post" class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  placeholder="password" name="password">
                </div>
                <div class="mt-3">
  <button type="submit" name="signin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
    SIGN IN
  </button>
</div>
                
                
              
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
  <!-- base:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
