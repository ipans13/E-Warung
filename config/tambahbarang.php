<?php
require_once "koneksi.php";
include "../session.php";
include "data_register.php";
$nama_barang = $_POST['barang'];
$harga= $_POST['harga'];
$stock= $_POST['stock'];
$id = $user['id'];

do{
    $random_id = mt_rand(1000,9999);
    $cek_id = $database_connection->prepare("SELECT * FROM barang_warung_".$id." WHERE kode_barang = ".$random_id);
    $cek_id->execute();
    $result = $cek_id->fetchAll();
    } while(count($result) > 0);

    $q = $database_connection->prepare("INSERT INTO barang_warung_".$id."(id, kode_barang, nama_barang, Price, stock) VALUES (NULL, ?, ?, ?, ?)");
    $q->execute([$random_id, $nama_barang, $harga, $stock]);
    
    if ($q->rowCount() > 0) {

        echo "<script>alert('Berhasil Menambahkan Barang');
        setTimeout(function() {window.location.href = '../Barang.php';}, 500);
        </script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Barang".$id."');
        setTimeout(function() {window.location.href = '../Barang.php';}, 500);
        </script>";
    }

?>