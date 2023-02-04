<?php
require_once "koneksi.php";
include "../session.php";
include "data_register.php";

$id = $user['id'];
$nama_warung= $_POST["warung"];
$nama_owner = $_POST["owner"];
$alamat= $_POST["alamat"];
$email= $user["email"];
$pass = $user["password"];
$passold= $_POST["passold"];
$passnew= $_POST["passnew"];


if($nama_warung != "" && $nama_owner != "" && $alamat != ""){
if($passnew !="" || $passold != ""){
if(sha1($passold) == $pass){
$q = $database_connection->prepare("UPDATE `akun` SET `nama_warung` = ?, 
`nama_owner` = ?, `alamat` = ?, `email`=?, `password`= SHA(?) WHERE `akun`.`id` = ?");
$q->execute([$nama_warung, $nama_owner, $alamat, $email, $passnew, $id]);
echo "<script>alert('data berhasil diubah');
    setTimeout(function() {window.location.href = '../dashboard.php';}, 500);
    </script>";
}
else{
    echo "<script>alert('Password yang dimasukkan salah');
    setTimeout(function() {window.location.href = '../profile.php';}, 500);
    </script>";
}
}
else{
    $q = $database_connection->prepare("UPDATE `akun` SET `nama_warung` = ?, 
`nama_owner` = ?, `alamat` = ?, `email`=? WHERE `akun`.`id` = ?");
$q->execute([$nama_warung, $nama_owner, $alamat, $email, $id]);
echo "<script>alert('data berhasil diubah');
    setTimeout(function() {window.location.href = '../dashboard.php';}, 500);
    </script>";
}
}
else{
    echo "<script>alert('Isi data yang bertanda bintang');
    setTimeout(function() {window.location.href = '../profile.php';}, 500);
    </script>";   
}


?>