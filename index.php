<?php
include "header.php";
?>


<body style="background-color: var(--bs-yellow);">
    <div class="container">
    <div class="row">
  <div class="col-lg-6 ">
    <div class="align-items-center">
    <ul class="navbar-nav nav-index">
        <li class="nav-item col-sm-6">
          <a class="nav-link " aria-current="page" href="#Tentang">Tentang</a>
        </li>
        <li class="nav-item col-sm-6">
          <a class="nav-link" href="#Bantuan">Bantuan</a>
        </li>
</ul>
        </div>
    <div class="col-lg-12 d-none d-lg-block">
    <img src="images/warung.svg" class="img-fluid">
    </div>  
</div>
  <div class="col-lg-6 col-sm-12 text-center ">
    <p class="h2 text-bold text-center text-white sel-datang">
    Selamat Datang di E-Warung, Silahkan Pilih Peran Anda
</p>
<div class="d-flex justify-content-center">
<div class="card kartu-datang ">
    <a class="nav-link link-index text-start" href="pemesanan.php">
    <span> Yang Mau Order </span> <span class="bi bi-arrow-right"></span></a>
    <a class="nav-link link-index text-start" href="dashboard.php">
    <span> Yang Punya Warung</span> <i class="bi bi-arrow-right"></i></a>
    <a class="nav-link link-index text-start" href="registrasi.php">
    <span>Yang Pingin Punya Warung</span><i class="bi bi-arrow-right"></i></a>
  </div>
  </div>
</div>
</div>
    </div>
    </div>
    <footer class="text-center footer">@Copyright by RivanSetiawan_TIFK20_UASWEB1</footer>
   
   
   
   
   
    <div class="popup" id="Tentang">
  
  <div class="row align-items-center popup_content">
    <div class="col">
      <div class="card justify-content-center popup_content" style="width: 100vh;">
        <a href="#" class="popup_close">&times;</a>
        <div class="card-body">
          <h5 class="card-title text-center">Tentang Kami</h5>
<p class="card-body informasi">E-warung adalah sebuah website yang digunakan untuk mempermudah pembeli dalam pemesanan barang yang diinginkan. Selain itu E-warung juga dapat memanagement stock barang pada warung dan juga pesanan yang diterima oleh warung </p>
        </div>
    </div>
  </div>
</div>


<div class="popup" id="Bantuan">
  
  <div class="row align-items-center popup_content">
    <div class="col">
      <div class="card justify-content-center popup_content" style="width: 100vh;">
        <a href="#" class="popup_close">&times;</a>
        <div class="card-body">
          <h5 class="card-title text-center">Bantuan Penggunaan Web</h5>
          <p class="card-body informasi">Pilih Peran: <br> 1. Sebagai Pemesanan: peran ini jika anda ingin memesan barang, dimana anda wajib memilih warung yang ada dan juga memasukkan nama pemesan, kemudian klik pesan jika anda ingin memesan barang yang ada. jika semua sudah selesai maka anda tinggal mengklik tombol "order sekarang".<br>
          2. Sebagai Pedagang: peran ini jika anda owner atau admin dari warung yang ada. dimana ada beberapa menu yaitu: dashboard, data penjualan dan barang. <br>
          3. Ingin mempunyai warung: Jika anda ingin membuat sendiri warung maka anda dapat memilih menu ini. dan memasukkan data pada form yang berbintang (*).
          </p>
      </div>
    </div>
  </div>
</div>
  </body>