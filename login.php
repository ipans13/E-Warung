<?php
ob_start();
session_start();

session_start();
if (isset($_SESSION['username']) === true) {
    header('Location: dashboard.php');
    
}
ob_end_clean();
include "header.php";
?>


<body>
<nav class="navbar navbar-expand">
  <div class="container">

    <div class="collapse navbar-collapse">
      <div class="navbar-nav ">
        <a class="nav-link " aria-current="page" href="index.php">Kembali</a>
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
<div class="col-lg-6 d-none d-lg-block ">
  <img src="images/warung.svg" class="img-fluid brand-logo" alt="">
</div>
<div class="col-ms-1 col-md-6 col-6 login justify-content-center">
  <div class="login-header text-center">
  <span class="brand-login">Login</span>
  <span class="brand-login2">Yang punya warung</span>
  </div>
<form >
  <div class="mb-3">
  <label for="username" class="form-label">Email</label>
  <input type="email" class="form-control" class="username" name="username" required>
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control" id="password" name="password" required>
</div>
<div class="login-action">
  <a href="" class="forget">Lupa Password?</a>
<button class="btn btn-primary">Login</button>
</div>
</div>
</form>
</div>
</div>
<img src="images/wave2.svg" class="waveclr img-fluid d-none d-lg-block">

<script src="/modul/JS/login.js">


</script>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>
</body>