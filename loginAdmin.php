<?php
    session_start();
    // include('sesion.php');
    include('koneksi.php');

?>
<?php

include 'crudProduk.php';
require_once 'koneksi.php';
$koneksi = koneksiProduk();
error_reporting(0);

// if (isset($_SESSION['username'])) {
//     header("Location: register.php");
// }

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM tb_register WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    
</head>
<body>
    <div class="container-fluid">
        <nav>
            <div class="cont-nav">
                <form action="">
                    <a href="index.html" class="logo"><h2>Freshly Dropped</h2></a>
                    <ul class="menu">
                        <li><input type="teks"  autocomplete="0ff"></li>
                        <li><button type="submit"><span class="material-symbols-outlined">
                            search
                            </span></button>
                        </li>
                        <li>
                           <a href=""> <span class="material-symbols-outlined card-shop">
                            shopping_cart
                            </span></a>
                        </li>
                        <li class="img-profile">
                            <img src="Images/Beras.png" alt="">
                        </li>
                        <li>
                            <h3>Admin</h3>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

        <!-- hero -->
        <div class="container">
            <div class="hero">
                <div class="tagline">
                    <h2>Freshly Dropped</h2>
                    <p>Freshly Dropped hadir untuk membantu anda, memilih bahan makanan dengan kualitas terbaik, sesuai dengan kebutuhan dan keinginan anda.</p>
                    <button type="submit" class="buy-now">
                        <a href="daftarSemuaProduk.php">
                            Beli Sekarang
                        </a>
                        <span class="material-symbols-outlined navigat">
                            navigate_next
                            </span>
                    </button>
                </div>
                <div class="hero-image">
                    <img src="Images/Heroimage.png" alt="">
                </div>
            </div>
        </div>

        <!-- Kategori -->
        <div class="container-kategori">
            <h2>KATEGORI</h2>
            <div class="container-card">
                <?php?>
                <a href="daftarProduk.php?jenis_produk=buah" class="card-body">
                    <img src="Images/Buahan.png" alt="">
                    <h4 class="title">Buah-Buahan</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=sayur" class="card-body">
                    <img src="Images/Sayur.png" alt="">
                    <h4 class="title">Sayur-Sayuran</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=umbian" class="card-body">
                    <img src="Images/Umbian.png" alt="">
                    <h4 class="title">Umbian-umbian</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=kacang" class="card-body">
                    <img src="Images/Kacang.png" alt="">
                    <h4 class="title">Kacang - Kacangan</h4>
                </a>
            </div>
        </div>

        <!-- Rekomendasi -->
        <div class="container-rekomendasi">
            <!-- <h2>KATEGORI</h2> -->
            <div class="container-card">
                <a href="daftarProduk.php?jenis_produk=beras" class="card-body">
                    <img src="Images/Beras.png" alt="">
                    <h4 class="title">Beras</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=telur" class="card-body">
                    <img src="Images/telur.png" alt="">
                    <h4 class="title">Telur</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=daging" class="card-body">
                    <img src="Images/daging.png" alt="">
                    <h4 class="title">Daging</h4>
                </a>
                <a href="daftarProduk.php?jenis_produk=ikan" class="card-body">
                    <img src="Images/ikan.png" alt="">
                    <h4 class="title">Ikan</h4>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container-footer">
                <div class="tentang-follow">
                    <div class="tentang">
                        <h4>Tentang</h4>
                        <p>
                            layanan makanan yang mengantarkan kotak makanan yang baru dipetik untuk Anda siapkan di rumah. Resep dan item dipilih dengan cermat sesuai keinginan dan kebutuhan pelanggan kami
                        </p>
                    </div>
                    <div class="follow">
                        <h4>Ikuti Kami</h4>
                        <div class="follow-icon">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="layanan">
                    <h4>Layanan</h4>
                    <h3>24 jam untuk anda</h3>
                    <h3>Antar kerumah</h3>
                    <h3>100% Qualitas terbaik</h3>
                </div>

                <div class="bantuan">
                    <a href="">
                        <h4>Bantuan</h4>
                        <p>Costumer services</p>
                    </a>
                </div>

                <div class="saran">
                    <h4>Saran</h4>
                    <form action="">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan Email">
                        <label for="comment">Komentar</label>
                        <textarea name="kommentar" id="comment" cols="30" rows="5"></textarea>
                        <button type="submit">Kirim</button>
                    </form>
                </div>
            </div>
            
        </footer>
        <div class="copyright">
            <p>Copyright &copy 2022 Ahmad sutrio p </p>
        </div>

    </div>
        

   
</body>
</html>
