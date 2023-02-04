<?php
ob_start();
session_start();
require_once "config/koneksi.php";
include "header.php";
include 'session.php';
//include 'config/data_register.php';

try{
    
    $stmt = $database_connection->prepare("SELECT * FROM akun WHERE email = ?");
    $stmt->execute([$_SESSION['username']]);
    $user = $stmt->fetch();
  $id = $user['id'];
$sql = "SELECT * FROM barang_warung_".$id. " ORDER BY `nama_barang` ASC";
$q = $database_connection -> query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);}
catch(PDOException $e){
  die("Tidak Bisa Membuka Database $database_name :" . $e->getMessage());
  }
?>


<body>



<nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="navbar-brand">
        <img src="images/warung.svg" alt="" class="brand">
    <span>E-Warung</span>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="penjualan.php">Data Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Barang</a>
        </li>
      </ul>
        
        <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/config/logout.php">Logout</a>
        </li>
        </div>
      </li>
</ul>
</nav>

<div class="container list-barang">
<a href="#Tambah_barang" class="button_tambah"><button type="button" class="btn btn-success" data-bs-target="#Tambah_barang">
  <span>Tambah</span></button></a>

<table id="myTable" class="table table-striped table-bordered table" style="width: 90%; margin-top: 1rem;">
  <thead>
    <tr>
      <th style="width:8rem;">ID Barang</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Stok</th>
      <th style="width: 1.5rem;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (!empty($q)) {
      $x = 1;
      while ($row = $q->fetch()) {
        
        echo '<tr id="list'.$x.'">';
        echo '<td class="td-1-'.$x.'">' . $row['kode_barang'] . "</td>";
        echo "<td>" . $row['nama_barang'] . "</td>";
        echo '<td><span class="editnumber" id="price">' . $row['Price'] . "</td>";
        echo '<td><span class="editnumber" id="stock">' . $row['stock'] . "</td>";
        echo '<td><div type="button" class="btn btn-danger delete-barang bi bi-trash3"></div></td>';
        echo "</tr>";
        $x++;
      } 
    } else {
      echo "Data kosong";
    }
    ?>
  </tbody>
</table>
</div>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>

<div class="popup" id="Tambah_barang">
  
        <div class="row align-items-center popup_content">
          <div class="col">
            <div class="card justify-content-center popup_content" style="width: 100vh;">
              <a href="#" class="popup_close">&times;</a>
              <div class="card-body">
                <h5 class="card-title text-center">Tambah Barang</h5>
                <form action="config/tambahbarang.php" method="POST">
    <div class="mb-3">
  <label for="Warung" class="form-label">Nama Barang</label>
  <input type="text" class="form-control reg-control" id="barang" name="barang" placeholder="Masukkan Nama Barang" required>
</div>

<div class="mb-3">
  <label for="harga" class="form-label">Harga</label>
  <input type="number" class="form-control reg-control harga" id="harga" name="harga" placeholder="Masukkan Harga Barang" required min=1>
</div>

<div class="mb-3">
  <label for="stok" class="form-label">Stok</label>
  <input type="number" class="form-control reg-control" id="stock" name="stock" placeholder="Masukkan Stock Tersedia" required min=1>
</div>

<button type="submit" id="tamb_brg" class="btn btn-primary">Submit</button>
    
    </form>
            </div>
          </div>
        </div>
    </div>
    
    <script src="/modul/JS/barang.js"></script>

</body>
