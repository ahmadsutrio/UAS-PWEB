<?php
    session_start();
    include 'crudProduk.php';
    require_once 'koneksi.php';
    $koneksi = koneksiProduk();
    $jnProduk = $_GET['jenis_produk'];
    $hasil = tampilHasil($jnProduk);

    $location = "Images/Images Produk/";
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
    <title>Daftar Produk</title>
</head>
<body>
    <div class="container-fluid">
        <!-- <footer> -->
        <?php
            if(isset($_SESSION['username'])){
                $aa = $_SESSION['username'];
                    echo "<nav>
                        <div class='cont-nav'>
                            <form action='cariProduk.php' method='post'>
                                <a href='index.php' class='logo'><h2>Freshly Dropped</h2></a>
                                <ul class='menu'>
                                    <li><input type='teks' name='nama_produk' autocomplete='0ff'></li>
                                    <li><button type='submit'><span class='material-symbols-outlined'>
                                        search
                                        </span></button>
                                    </li>
                                    <li>
                                    <a href='cardKeranjang.php'> <span class='material-symbols-outlined card-shop'>
                                        shopping_cart
                                        </span></a>
                                    </li>
                                    <li class='img-profile'>
                                    <img src='Images/Beras.png' alt=''>
                                    </li>
                                    <li>
                                        <h3>$aa</h3>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </nav>";
                }else{
                    echo "<nav>
                            <div class='cont-nav'>
                                <form action='cariProduk.php' method='post'>
                                    <a href='index.php' class='logo'><h2>Freshly Dropped</h2></a>
                                    <ul class='menu'>
                                        <li><input type='teks' name='nama_produk' autocomplete='0ff'></li>
                                        <li><button type='submit'><span class='material-symbols-outlined'>
                                            search
                                            </span></button>
                                        </li>
                                        <li>
                                        <a href='cardKeranjang.php'> <span class='material-symbols-outlined card-shop'>
                                            shopping_cart
                                            </span></a>
                                        </li>
                                        <li>
                                            <a href='register.php' class='daftar'>Daftar</a>
                                            <a href='login.php' class='masuk'>Masuk</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </nav>";
                }
        ?>
        

        <div class="container-fluid">
            <div class="content">
                <div class="container-content">
                    
                <?php foreach ($hasil as $row) :  ?>
                    <?php $nama = $row['nama_produk'];?>

                    <a href="card-buy.php?nama_produk=<?php echo $nama?>" class="container-card">
                        <img src='<?php echo $location ?><?php echo $row['gambar_produk']?>' alt=''>
                        <p><?php echo $row['nama_produk'] ?></p>
                        <h3 class="harga">Rp. <?php echo number_format($row['harga_produk']) ?></h3>
                        <p class="tmpt"><?php echo $row['satuan_produk'] ?> gram</p>
                    </a>

                <?php endforeach;?>
                    

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

    </div>
</body>
</html>