<?php
$database_hostname = "localhost";
$database_username ="id20151811_ewarungrivan131308080202";
$database_password = "K6NqGLR]]%q*$49Z";
$database_name = "id20151811_ewarungonline";

try{
 //sintaks berhasil?  
 $database_connection= new PDO("mysql:host=$database_hostname;dbname=$database_name",
 $database_username, $database_password); 
 $cek = "Koneksi Berhasil";
//  echo $cek;
}catch(PDOException $x){
die($x->getMessage());
}
?>