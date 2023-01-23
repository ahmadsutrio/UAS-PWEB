<?php
include('crudProduk.php');
$nama = $_POST['nama_produk'];
$jnproduk = $_POST['jenis_produk'];
$harga = $_POST['harga_produk'];
$satuan = $_POST['satuan_produk'];
$gambar = $_POST['gambar_produk'];

$hasil = tambahProduk($nama,$jnproduk,$harga,$satuan,$gambar);
if($hasil > 0)
    header("Location: daftarSemuaProduk.php");
else {
    header("Location: tambahProduk.php");
}

?>