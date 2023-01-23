<?php
include('crudProduk.php');
$id = $_GET['id_produk'];
// $nama = $_GET['nama_produk'];

$hasil = hapusProduk($id);
if($hasil > 0){
    header("Location: daftarSemuaProduk.php");
}else {
    header("Location: hapusProduk.php");
}
?>