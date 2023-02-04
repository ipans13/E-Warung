<?php
require_once "koneksi.php";
$nama_warung = $_POST["warung"];
$nama_owner= $_POST["owner"];
$email= $_POST["email"];
$alamat= $_POST["alamat"];
$password= $_POST["password"];

$cek_email = $database_connection->prepare("SELECT * FROM akun WHERE email = '" . $email . "'");
$cek_email->execute();
// $cek_email->bindValue(':email',$email);
// $result_email = $cek_email->fetchAll();


if($cek_email->rowCount() > 0){
    echo "<script>alert('Email Yang Didaftarkan sudah tersedia, coba lagi');
    setTimeout(function() {window.location.href = '../registrasi.php';}, 500);
    </script>";
}
else{
do{
$random_id = mt_rand(210000,219999);
$cek_id = $database_connection->prepare("SELECT * FROM akun WHERE id = :random_id");
$cek_id->execute();
$cek_id->bindValue(':random_id',$random_id);
$result = $cek_id->fetchAll();
} while(count($result) > 0);

$name_brg = "barang_warung_". $random_id ;
$newtabel ="CREATE TABLE ". $name_brg ." (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    kode_barang INT(20) NOT NULL,
    nama_barang VARCHAR(50) NOT NULL,
    Price INT(10) NOT NULL,
    stock INT(10) NOT NULL
)";

$database_connection->exec($newtabel);

$q = $database_connection->prepare("INSERT INTO `akun` (`No`, `id`, `nama_warung`, `nama_owner`, `email`, `alamat`, `password`) VALUES (NULL, ?, ?, ?, ?, ?, SHA1(?));");
$q->execute([$random_id, $nama_warung, $nama_owner, $email, $alamat,$password]);

if ($q->rowCount() > 0) {
    // Show a pop-up message
    echo "<script>alert('Registrasi Berhasil');
    setTimeout(function() {window.location.href = '../login.php';}, 500);
    </script>";
} else {
    echo "<script>alert('Registrasi gagal, silahkan coba lagi');.</script>";
}
}
// header("Location: ../login.php");

?>