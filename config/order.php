<?php
require_once "koneksi.php";

$id = $_POST['id'];
$pemesan = $_POST['pemesan'];
$nohp = $_POST['nohp'];
$resultbarang = $_POST['kode_barang'];
$resultjumlah = $_POST['jumlahorder'];

if($id == 'null'){
$respone = array(
    'status' => 'batal',
    'message' => 'Pilih Warung dahulu'

);


}elseif( $pemesan == ""){
    $respone = array(
        'status' => 'batal',
        'message' => 'isi data dengan benar'
    
    );


}elseif($resultbarang == "" && $resultjumlah == ""){
    $respone = array(
        'status' => 'batal',
        'message' => 'Anda belum memesan'
    
    );
}else{
    $arr_barang = explode("; ",$resultbarang);
    $arr_jumlah = explode("; ",$resultjumlah);

    do{
        $random_id = mt_rand(900000,999999);
        $cek_id = $database_connection->prepare("SELECT * FROM `order` WHERE id = :random_id");
        $cek_id->execute();
        $cek_id->bindValue(':random_id',$random_id);
        $result = $cek_id->fetchAll();
        } while(count($result) > 0);
        date_default_timezone_set('Asia/Jakarta');
$timestamp = date("d/m/Y  H:i:s");
$q = $database_connection->prepare("INSERT INTO `order` (`index`, `id`, `id_pemesan`,`pemesan`, `nohp`, `kode_barang`, `jumlah`, `timestamp`) VALUES (NULL,?, ?, ?, ?, ?, ?, ?)");
$q->execute([$id,$random_id,$pemesan,$nohp,$resultbarang,$resultjumlah, $timestamp]);


    for($x=0; $x < count($arr_barang); $x++){
        
        $query = $database_connection->prepare("UPDATE `barang_warung_".$id."` SET `stock`=`stock` - ".$arr_jumlah[$x]." WHERE `kode_barang` = ".$arr_barang[$x]);
         $query->execute(); 

}
$respone = array(
    'status' => 'success',
    'message' => 'Terima kasih telah memesan, pesanan anda sedang dalam antrian'
);

}

echo json_encode($respone);

?>