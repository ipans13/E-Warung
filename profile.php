<?php
ob_start();
session_start();
include "header.php";
include "session.php";
include "config/koneksi.php";
//include "config/data_register.php";

?>
<?php
 $stmt = $database_connection->prepare("SELECT * FROM akun WHERE email = ?");
    $stmt->execute([$_SESSION['username']]);
    $user = $stmt->fetch();
                    $id = $user['id'];
                    $namawarung = $user['nama_warung'];
                    $namaowner = $user['nama_owner'];
                    $email = $user['email'];
                    $alamat = $user['alamat'];
                ?>

<body>
<nav class="navbar navbar-expand-lg">
  <div class="container justify-content-center">
    <div class="navbar-brand">
  <div class="profile-header">Profile
  </div>
  </div>
</nav>
<div class="container">
    <div class="text-center">
  
</div>
  <!-- <img src="/images/default_profile.svg" class="rounded"> -->
  <form action="config/edit.php" method="POST">
  <div class="mb-3">
  <label for="Warung" class="form-label">ID *</label>
  <input type="text" readonly disabled class="form-control reg-control" name="id" id="id" value="<?php echo $id?>">
</div>  
  <div class="mb-3">
  <label for="Warung" class="form-label">Warung *</label>
  <input type="text" class="form-control reg-control" name="warung" id="warung" placeholder="Masukkan Nama Warung" value="<?php echo $namawarung?>">
</div>

<div class="mb-3">
  <label for="owner" class="form-label">Owner *</label>
  <input type="text" class="form-control reg-control" name="owner" id="owner" placeholder="Masukkan Nama Owner" value="<?php echo $namaowner?>">
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email address *</label>
  <input type="email" readonly disabled class="form-control reg-control" name="email" id="email" value="<?php echo $email?>">
</div>

<div class="mb-3">
  <label for="password-old" class="form-label disabled" >Password Lama</label>
  <input type="password" class="form-control reg-control" name="passold" id="password-old" placeholder="Masukkan Password">
</div>

<div class="mb-3">
  <label for="password-new" class="form-label disabled" >Password Baru</label>
  <input type="password" class="form-control reg-control" name="passnew" id="password-new" placeholder="Masukkan Password">
</div>
<div class="mb-3">
  <label for="alamat" class="form-label">Alamat *</label>
  <input class="form-control reg-control" name="alamat" id="alamat" value="<?php echo $alamat?>"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>

</body>