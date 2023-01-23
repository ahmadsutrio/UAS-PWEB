<?php
include('crudProduk.php');
$nama = $_GET['id_order'];

$hasil = hapusOrder($nama);
if($hasil > 0)
    header("Location: cardKeranjang.php");
else {
    header("Location: tambahProduk.php");
}

?>