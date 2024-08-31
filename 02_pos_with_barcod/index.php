<?php
include_once('help/users.php');
include_once('database/db.php');

if(isset($_SESSION['email'])){
    if($_SESSION['role'] === 'admin') {
        header('Location: pages/dashboard.php');
    }else {
        header('Location: pages/user.php');
    }
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (login($email, $password, $pdo) && is_admin($email, $password, $pdo)) {
        $row = login($email, $password, $pdo);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        header('Location: pages/dashboard.php');

    } elseif(login($email, $password, $pdo)){
        header('Location: pages/user.php');
    }
    else {
        $_SESSION['status'] = "Wrong Email or Password or Fields are empty";
        $_SESSION['status_code'] = "error";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pos </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="btn-login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

?>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: '<?= $_SESSION['status_Code']?>',
                    title: '<?= $_SESSION['status']?>'
                })
            });
    </script>


<?php
unset($_SESSION['status']);
}
?>
</body>
</html>
