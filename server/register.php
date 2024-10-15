<?php
    include"service/database.php";
    session_start();
    $register_message = "";

    if(isset($_SESSION["is_login"])) {
      header("location: dashboard.php");
  }

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash_password = hash("md5",$password);

        try {
          $sql = "INSERT INTO tbitoya (username, email, password) VALUES ('$username', '$email', '$hash_password')";
  
          if($db->query($sql)) {
              $register_message = "daftar akun berhasil, silahkan login";
          }else{
              $register_message = "daftar akun gagal, silahkan coba lagi";
          }
        }catch (mysqli_sql_exception) {
            $register_message = "email sudah ada, silahkan ganti yang lain";
        }
        $db->close();
    }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-in</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <div class="modal modal-sheet d-block bg-body-secondary p-2 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-between">
        <h1 class="fw-bold mb-0 fs-2">Register Akun</h1>

      </div>
      <form action="register.php" method="POST">

        <div class="modal-body p-5 pt-0">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" name="username"
                required>
              <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="floatingEmail" placeholder="Email" name="email"
                required>
              <label for="floatingEmail">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" name="password"
                required>
              <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="register">Continue</button>
            <small class="text-body-secondary">By clicking Register, you agree to the terms of use.</small>
            <hr class="my-4">
            <h2 class="fs-5 fw-bold mb-3">Login</h2>

            <a href="login.php"button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit" name="register">
              Login
            </a>
          </form>
  <!-- Custom styles for this template -->
</head>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"></script>

</body>

</html>