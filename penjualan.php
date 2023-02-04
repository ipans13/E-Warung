<?php
ob_start();
session_start();
include "header.php";
include 'session.php';
include 'config/data_register.php';
require_once 'config/koneksi.php';


?>


<body>
<!-- 
<?php
                    $id = $user['id'];
                    $namawarung = $user['nama_warung'];
                    $namaowner = $user['nama_owner'];
                    $email = $user['email'];
                    $alamat = $user['alamat'];
                ?> -->


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
          <a class="nav-link active" href="">Data Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Barang.php">Barang</a>
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
<table id="myTable" class="table table-striped table-bordered table text-center" style="width: 90%; margin-top: 1rem;">
  <thead>
    <tr>
      <th style="width:8rem;">ID Pemesan</th>
      <th>Nama Pemesan</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>timestamp</th>

    </tr>
  </thead>
  <tbody>
  <?php
          $getquery = "SELECT * FROM `Penjualan` WHERE `id_warung`= ".$id." ORDER BY `timestamp` ASC";
          $query = $database_connection-> prepare($getquery);
          $query->execute();
while($row = $query->fetch()){

  echo '<tr id='.$row['id_pemesan'].' >';
  echo '<td>'.$row['id_pemesan'].'</td>';
  echo '<td>'.$row['nama_pemesan'].'</td>';
                echo '<td class="namabarang">';

                $arraybarang = explode(";", $row['nama_barang']);
                for($x=0; $x < count($arraybarang)-1; $x++){
                    echo "<li>";
                     echo $arraybarang[$x];
                     echo "</li>";
                }                
              echo '</td>';
               echo  '<td class="jumlahbarang">';
               $arrayjumlah = explode(";", $row['jumlah']);
                for($x=0; $x < count($arrayjumlah)-1; $x++){
                     echo "<li>";
                     echo $arrayjumlah[$x];
                     echo "</li>";
                }                
              
               echo '</td>';
                echo '<th>';
                echo $row['timestamp'];
                echo '</th>';
              }
            

          ?>
  </tbody>
</table>
</div>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>

</body>