<?php
ob_start();
require_once 'koneksi.php';
session_start();
try{
    $stmt = $database_connection->prepare("SELECT * FROM akun WHERE email = ?");
    $stmt->execute([$_SESSION['username']]);
    ob_end_clean();
    $user = $stmt->fetch();
}catch(PDOException $e){
die("Tidak Bisa Membuka Database $database_name :" . $e->getMessage());
}

?>