<?php
  require_once 'koneksi.php';
  include('crudProduk.php');
    $koneksi = koneksiProduk();
    $nama = $_POST['username'];     
    $email = $_POST['email'];
    $noHp = number_format($_POST['no_hp']);
   
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
    $password2 = mysqli_real_escape_string($koneksi,$_POST['rypassword']);

    $hasil = tambahUser($nama,$email,$no_hp,$password,$rypassword);
    if($hasil > 0)
        header("Location: cardKeranjang.php");
    else {
        header("Location: tambahProduk.php");
    }


?>