<?php
require_once "koneksi.php";
include "../session.php";
include "data_register.php";


$kode= $_POST["id"];
$id = $user["id"];
$q = $database_connection->prepare("DELETE FROM `barang_warung_".$id."` WHERE `kode_barang` = ?");
$q->execute([$kode]);
echo "<script>alert('Barang telah di hapus');
setTimeout(function() {window.location.href = '../Barang.php';}, 500);
</script>";
?>