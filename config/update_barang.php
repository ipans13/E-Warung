<?php
require_once "koneksi.php";
include "../session.php";
include "data_register.php";

    $text = $_POST["text"];
    $id = $_POST["kode"];
    $item = $_POST["item"];
    
$id_warung = $user["id"];
    if($item == "price"){
    $query = "UPDATE `barang_warung_".$id_warung."` SET `Price` =".$text ." WHERE `kode_barang` = ".$id;
    $statement = $database_connection->prepare($query);
    $statement->execute();
}
elseif($item == "stock"){
    $query = "UPDATE `barang_warung_".$id_warung."` SET `stock` =".$text ." WHERE `kode_barang` = ".$id;
    $statement = $database_connection->prepare($query);
    $statement->execute();
}
?>