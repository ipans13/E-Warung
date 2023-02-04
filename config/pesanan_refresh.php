<?php
require_once "koneksi.php";

$id = $_POST['id'];

          $getquery = $database_connection->prepare("SELECT * FROM `order` WHERE `id`= ".$id." ORDER BY `timestamp` ASC");
          $query = $database_connection -> query($getquery);
          $query->setFetchMode(PDO::FETCH_ASSOC);

while($row = $query->fetch()){

  echo '<tr id='.$row['id_pemesan'].' >';
  echo '<td>'.$row['pemesan'].'</td>';
                echo '<td>';

                $arraybarang = explode(";", $row['kode_barang']);
                foreach($arraybarang as $data){
                  $getnamabarang = $database_connection->prepare("SELECT * FROM `barang_warung_".$id."` WHERE `kode_barang`= ".$data);
                  $getnamabarang->execute();
                  while ($nama = $getnamabarang->fetch()) {
                    echo "<li>";
                     echo $nama['nama_barang'];
                     echo "</li>";
                }                
              }
              echo '</td>';
               echo  '<td>';
               $arrayjumlah = explode(";", $row['jumlah']);
                for($x=0; $x < count($arrayjumlah)-1; $x++){
                     echo "<li>";
                     echo $arrayjumlah[$x];
                     echo "</li>";
                }                
              
               echo '</td>';
                echo '<th>';
                echo $row['timestamp'];
                echo '</th>';
                echo '<td>Rp.';
                $TotalHarga = 0;
                
                for($x=0; $x < count($arraybarang)-1; $x++){
                $Harga=0;
                  $getnamabarang = $database_connection->prepare("SELECT * FROM `barang_warung_".$id."` WHERE `kode_barang`= ".$arraybarang[$x]);
                  $getnamabarang->execute();
                    $harga = $getnamabarang->fetch()['Price'];
                    $TotalHarga = $TotalHarga + ($harga * $arrayjumlah[$x]);
                }
echo $TotalHarga;

                echo '</td>';
                echo '<td class="action" id='.$row['id_pemesan'].'><button type="button" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
              </button> <button type="button" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
              </button></td>';
echo '</tr>';
              }


          ?>