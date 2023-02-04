<?php
ob_start();
session_start();
include "header.php";
include 'session.php';
require_once "config/koneksi.php";
//include 'config/data_register.php';
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

<?php
                    

                    
                ?>


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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="penjualan.php">Data Penjualan</a>
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
<div class="container">
  <div class="row">
<div class="col-lg-6 col-sm-12 text-center">
  <p class="dashboard-name"> dashboard </p>
    
    <div class="warung justify-content-start text-start"><span class="nama_warung">warung <?php echo $namawarung?> </span></div>
    <div class="dashboard-warung">
    </div>
    <div class="info-owner">
    <ul class="list-group text-start">
    <li class="list-group-item"><i class="bi bi-person-vcard"></i> ID: <span id="id"> <?php echo $id?> </span></li>
  <li class="list-group-item"><i class="bi bi-person-circle"></i>  Owner:  <span id= "owner"> <?php echo $namaowner?> </span></li>
  <li class="list-group-item"><i class="bi bi-envelope"></i>  Email  : <span> <?php echo $email?> </span></li>
  <li class="list-group-item"><i class="bi bi-geo-alt"></i>  Alamat <span>        : <?php echo $alamat?> </span></li>
</ul>
    </div>
    <div class="d-flex">
    <div class="card flex-fill kartu">
  <div class="card-body">
  <p class="card-text">
    <?php
    $queryinfobarang = $database_connection->prepare("SELECT * FROM barang_warung_".$id);
    $queryinfobarang->execute();
    $barang = $queryinfobarang->fetchAll();
    echo count($barang);
    ?>
  </p>  
  <h5 class="card-title">jumlah barang</h5>
  
  </div>
</div>


<div class="card flex-fill kartu">
  <div class="card-body">
  <p class="card-text">
    <?php
    $queryinfobarang = $database_connection->prepare("SELECT * FROM Penjualan WHERE id_warung = ".$id);
    $queryinfobarang->execute();
    $barang = $queryinfobarang->fetchAll();
    $jumlah_barang = 0;

    foreach($barang as $data){
      $tanggal = explode(" ", $data['timestamp']);
      date_default_timezone_set('Asia/Jakarta');
      if(date("d/m/Y") == $tanggal[0]){
        $jumlah_barang = $jumlah_barang + 1;
      }
    }
    echo $jumlah_barang;
    ?>
  </p>  
  <h5 class="card-title">Penjualan hari ini</h5>
  
  </div>
</div>
<div class="card flex-fill kartu">
  <div class="card-body">
  <p class="card-text">
    <?php
    $queryinfobarang = $database_connection->prepare("SELECT * FROM barang_warung_".$id. " WHERE stock = 0" );
    $queryinfobarang->execute();
    $barang = $queryinfobarang->fetchAll();
    echo count($barang);
    ?>
  </p>  
  <h5 class="card-title">stock kosong</h5>
  
  </div>
</div>
    </div>
</div>
    <div class="col-lg-6 col-sm-12 text-center">
    <p class="dashboard-name text-center">Pesanan</p>
    <table id="example" class="table table-striped table-pos" style="width:100%">
        <thead>
            <tr >
                <th>Pemesan</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Waktu memesan</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
          $getquery = "SELECT * FROM `order` WHERE `id`= ".$id." ORDER BY `timestamp` ASC";
          $query = $database_connection -> query($getquery);
          $query->setFetchMode(PDO::FETCH_ASSOC);
while($row = $query->fetch()){

  echo '<tr id='.$row['id_pemesan'].' >';
  echo '<td>'.$row['pemesan'].'</td>';
                echo '<td class="namabarang">';

                $arraybarang = explode(";", $row['kode_barang']);
                foreach($arraybarang as $data){
                  $getnamabarang = $database_connection->prepare("SELECT * FROM `barang_warung_".$id."` WHERE `kode_barang`= ".$data);
                  $getnamabarang->execute();
                  while ($nama = $getnamabarang->fetch()) {
                    echo "<li>";
                     echo $nama['nama_barang'];
                     echo "</li>";
                }                
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
                echo '<td>Rp.';
                $TotalHarga = 0;
                
                for($x=0; $x < count($arraybarang)-1; $x++){
                $Harga=0;
                  $getnamabarang = $database_connection->prepare("SELECT * FROM barang_warung_".$id." WHERE kode_barang = ".$arraybarang[$x]);
                  $getnamabarang->execute();
                    $harga = $getnamabarang->fetch()['Price'];
                    $TotalHarga = $TotalHarga + ($harga * $arrayjumlah[$x]);
                }
echo $TotalHarga;

                echo '</td>';
                echo '<td class="action" id='.$row['id_pemesan'].'><button type="button" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
              </button> <button type="button" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
              </button></td>';
echo '</tr>';
              }

  
          ?>
        </tbody>  
</table>
    </div>
    </div>
</div>
</div>
</div>
<script src="/modul/JS/dashboard.js"></script>
<footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>
</body>

