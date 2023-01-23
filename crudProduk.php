<?php
    require_once 'koneksi.php';

	function tampilHasil($jnProduk){
        $koneksi = koneksiProduk();
        $sql = "SELECT * FROM tb_produk WHERE jenis_produk='$jnProduk'";

        $tampil = mysqli_query($koneksi,$sql);
        $rows = [];
		//looping ambil data 
		while ($row = mysqli_fetch_assoc($tampil)) {
			$rows[] = $row;
		}
		return $rows;

    }
    function tampilSemuaProduk($sql){
        $koneksi = koneksiProduk();
        $tampil = mysqli_query($koneksi,$sql);
        $rows = [];
		//looping ambil data 
		while ($row = mysqli_fetch_assoc($tampil)) {
			$rows[] = $row;
		}
		return $rows;

    }
    

    function cariProduk($nama){

		return tampilSemuaProduk("SELECT * FROM tb_produk WHERE nama_produk='$nama'");

    }

    function tambah($nama,$gambar,$harga){
      $koneksi = koneksiProduk();
        $sql = "insert into tb_order values(
          '','$nama','$gambar','$harga')";
        $hasil = 0;
        if(mysqli_query($koneksi, $sql))
        $hasil = 1;
        mysqli_close($koneksi);
        return $hasil;
        
    }
    ?>

    