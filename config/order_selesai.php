<?php
require_once "koneksi.php";


$id = $_POST['id'];
$action = $_POST['action'];

$namabarang = $_POST['namabarang'];
$jumlahbarang = $_POST['jumlahbarang'];

$queryasal = $database_connection->prepare("SELECT * FROM `order` WHERE `id_pemesan` =".$id);
$queryasal -> execute();
$querycopy = $queryasal->fetch();
$id_pemesan = $querycopy['id_pemesan'];
$kode_barang = $querycopy['kode_barang'];
$id_warung = $querycopy['id'];

if($action == "btn btn-success"){

$nama_pemesan = $querycopy['pemesan'];
$timestamp = $querycopy['timestamp'];

$inputque = $database_connection->prepare("INSERT INTO `Penjualan`(`Index`,`id_warung`, `id_pemesan`, `nama_pemesan`, `nama_barang`, `timestamp`, `jumlah`) VALUES (NULL, ?, ?, ?, ?, ?,?)");
$inputque->execute([$id_warung, $id_pemesan, $nama_pemesan, $namabarang, $timestamp,$jumlahbarang]);

$deleteque = $database_connection->prepare("DELETE FROM `order` WHERE `id_pemesan`=".$id_pemesan);
$deleteque->execute();


$data = array(
    'status' => 'selesai',
    'message' => 'Pesanan Berhasil Diselesaikan'
);       
}
if($action == "btn btn-danger"){
    $array_kode = explode(";", $kode_barang);
    $array_jumlah = explode(";", $jumlahbarang);
    for($x=0; $x < count($array_kode); $x++){
        $replace_st = $database_connection->prepare("UPDATE `barang_warung_".$id_warung."` SET `stock`= `stock` + ".$array_jumlah[$x]." WHERE `kode_barang`= ".$array_kode[$x]);
        $replace_st->execute();
    }
    $deletequ = $database_connection->prepare("DELETE FROM `order` WHERE `id_pemesan`=".$id_pemesan);
    $deletequ->execute();

    $data = array(
        'status' => 'batal',
        'message' => 'Pesanan Berhasil Dihapus'
    );
}
echo json_encode($data);

?>