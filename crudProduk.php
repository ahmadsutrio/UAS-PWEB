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

		return tampilSemuaProduk("SELECT * FROM tb_produk WHERE nama_produk LIKE'%$nama%'");

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
    function tambahProduk($nama,$jnproduk,$harga,$satuan,$gambar){
        $koneksi = koneksiProduk();
        $sql = "insert into tb_produk values(
          '','$nama','$jnproduk','$harga','$satuan','$gambar')";
        $hasil = 0;
        if(mysqli_query($koneksi, $sql))
        $hasil = 1;
        mysqli_close($koneksi);
        return $hasil;
        
    }

    function hapusMhs($nim){
      $koneksi = koneksiProduk();
      $sql = "delete * from tb_order where nama_produk.order='$nim'";
      if (!mysqli_query($koneksi, $sql)){
      die('Error: ' . mysqli_error());
      }
      $hasil = mysqli_affected_rows($koneksi);
      mysqli_close($koneksi);
      return $hasil;
      }

      // function registrasi($data){
      //   $koneksi = koneksiProduk();
      //   $email = $data['email'];
      //   $noHp = number_format($data['no_hp']);
      //   $username = strtolower(stripslashes($koneksi,$data['username']));
      //   $password = mysqli_real_escape_string($koneksi,$data['password']);
      //   $password2 = mysqli_real_escape_string($koneksi,$data['rypassword']);

      //   if($password !== $password2){
      //     echo "<script>
      //             alert('konfirmasi password tidak sesuai!');
      //           </script>";
      //     return false;
      //   }
      // }
      function hapusProduk($id){
        $koneksi = koneksiProduk();
        $sql = "DELETE FROM tb_produk WHERE id_produk='$id'";
        $hasil = 0;
        if(mysqli_query($koneksi, $sql))
        $hasil = 1;
        mysqli_close($koneksi);
        return $hasil;
      }
      function hapusOrder($id){
        $koneksi = koneksiProduk();
        $sql = "DELETE FROM tb_order WHERE tb_order.id_order='$id'";
        $hasil = 0;
        if(mysqli_query($koneksi, $sql))
        $hasil = 1;
        mysqli_close($koneksi);
        return $hasil;
      }

      function tambahUser($nama,$email,$password){
        $koneksi = koneksiProduk();
        $sql = "INSERT INTO tb_register VALUES(
                '','$nama','$email','$password'  
                )";
        $hasil = 0;
        if(mysqli_query($koneksi, $sql))
        $hasil = 1;
        mysqli_close($koneksi);
        return $hasil;
      
                
      }

    ?>

    