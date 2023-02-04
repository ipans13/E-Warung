<?php
include "header.php";

?>

<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="navbar-brand">
  <div class="regis-header">Registrasi Warung
  </div>
  
    </div>
    <div class="align-items-end">
    <ul class="navbar-nav">
        <li class="nav-item col-sm-6">
          <a class="nav-link regis-login" aria-current="page" href="login.php">Punya Akun?</a>
        </li>
        <li class="nav-item col-sm-2">
          <a class="nav-link regis-login" href="index.php">Kembali</a>
        </li>
</ul>
        </div>
  </div>
</nav>
<div class="container">
    <form action="/config/register.php" method="POST">
    <div class="mb-3">
  <label for="Warung" class="form-label">Warung</label>
  <input type="text" class="form-control reg-control" id="warung" name="warung" placeholder="Masukkan Nama Warung" required>
</div>

<div class="mb-3">
  <label for="owner" class="form-label">Owner</label>
  <input type="text" class="form-control reg-control" id="owner" name="owner" placeholder="Masukkan Nama Owner" required>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" class="form-control reg-control" id="email" name="email" placeholder="Masukkan Email" required>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control reg-control" id="password" name="password" placeholder="Masukkan Password" required>
</div>

<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control reg-controlarea" id="alamat" name="alamat" rows="3" required></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
    </div>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>

</body>