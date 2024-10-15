<?php
include "service/database.php";
session_start();

$login_message = "";

if (isset($_SESSION["is_login"])) {
  header("location: procces_login.php");
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hash_password = hash("md5", $password);

  $sql = "SELECT * FROM  tbitoya WHERE username='$username' AND email='$email' AND password='$hash_password'";

  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION["username"] = $data["username"];
    $_SESSION["is_login"] = true;

    header("location: procces_login.php");
  } else {
    $login_message = "Akun tidak ditemukan";
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
          <h1 class="fw-bold mb-0 fs-2">Login</h1>

          <form action="login.php" method="POST">
            <a href="index.php">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </a>
        </div>

        <i><?= $login_message ?></i>
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

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="login">Continue</button>
          </form>
          <small class="text-body-secondary">By clicking Login, you agree to the terms of use.</small>
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">Register Akun</h2>

          <a href="register.php" button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit" name="register">
            Register
          </a>
          <!-- Custom styles for this template -->
</head>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
</body>

</html>