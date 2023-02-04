<?php 
require_once "koneksi.php";

$id = $_POST['id'];
$getquery = "SELECT * FROM barang_warung_".$id." ORDER BY nama_barang";
$query = $database_connection -> query($getquery);
$query->setFetchMode(PDO::FETCH_ASSOC);


$z = 1;
echo "<script>";
echo 'var barang = document.querySelector(".barang");';
echo 'barang.innerHTML="";';
echo "barang.innerHTML='";
while($row = $query->fetch()){
    if($row['stock'] > 0 ){
    echo '<div class="col-m-2 text-center" style="width: 18rem;">';
    echo '<div class="card">';
    echo  '<div class="card-body" id="head-item'.$z.'">';
    echo   '<h5 class="card-title" id='.$row['kode_barang'].'>' .$row['nama_barang'].'</h5>';
    echo   '<p class="card-text">Stock:'.$row['stock'].'<br> Harga: '.$row['Price'].'</p>';
    echo   '<span class="btn btn-success" id="item'.$z.'" onclick="maupesan(this.id,'.$row['stock'].')">Pesan</span>';
    echo  '</div>';
    echo '</div>';
    echo '</div>';
    $z++;
}else {
        echo '<div class="col-m-2 text-center" style="width: 18rem;">';
    echo '<div class="card">';
    echo  '<div class="card-body" id="head-item'.$z.'">';
    echo   '<h5 class="card-title">'.$row['nama_barang'].'</h5>';
    echo   '<p class="card-text">Stock: '.$row['stock'].'<br> Harga: Rp.'.$row['Price'].'</p>';
    echo   '<span>Terjual Habis</span>';
    echo  '</div>';
    echo '</div>';
    echo '</div>';
    $z++;
    }
}
$padding = $z * 20;
echo "';";
echo 'barang.style.paddingLeft = "'.$padding.' rem"';

echo '</script>';


?>