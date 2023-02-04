<?php
require_once "config/koneksi.php";
include "header.php"; 

?>
<?php
$get_warung = ("SELECT `id`,`nama_warung` FROM `akun` ORDER BY `nama_warung` ASC");
$result = $database_connection->query($get_warung);
$result ->setFetchMode(PDO::FETCH_ASSOC);
?>

<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="navbar-brand">
  <div class="regis-header">Pemesanan
  </div>
  
    </div>
    <a class="nav-link regis-header regis-login" href="index.php">Kembali</a>
  </div>
</nav>
<form>
<div class="container">
    <div class="mb-3">
  <label for="Warung" class="form-label">Warung</label>
  <select class="form-select reg-control pilih-warung" id="warung" placeholder="Masukkan Nama Warung">
  <option value='0' selected disabled>-----Pilih Warung------</option> 
  <?php
  $x = 1;
  while($row = $result->fetch()) {
    
    echo '<option id="'.$row['id'].'" class="pilih-warung" value="'.$x.'" >'.$row['nama_warung'].'</option>';
    $x++;
  }
  ?>   
  </select>
  </div>
<div class="mb-3">
  <label for="owner" class="form-label">Pemesan</label>
  <input type="text" class="form-control reg-control" id="pemesan" name="pemesan" placeholder="Masukkan Nama Pemesan">
</div>

<div class="mb-3">
  <label for="number" class="form-label">No.Telepon</label>
  <input type="number" class="form-control reg-control" id="nohp" name="nohp" placeholder="Masukkan Nomer Telepon">
</div>
<div class="d-flex flex-wrap overflow-x:auto" style="max-height:300px; width: 100%; margin-bottom: 2rem">
<div class="justify-content-center barang" style="width: 300%; padding-left: 7rem;">
  <p>Pilih Warung Terlebih dahulu</p>
</div>
</div>
<button type="submit" class="btn btn-primary">Order Sekarang</button>
</div>
</form>


<script src="/modul/JS/pemesanan.js">

</script>



</script>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>
</body>