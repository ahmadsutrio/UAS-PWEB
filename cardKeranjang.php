<?php
    include('sesion.php');
    session_start();
    include 'crudProduk.php';
    require_once 'koneksi.php';
    $location = "Images/Images Produk/";
    $koneksi = koneksiProduk();


    if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    }
    

    if(!isset($_GET['nama_produk'])){
        $sql   = "SELECT * FROM tb_order";
        $hasil = tampilSemuaProduk($sql);
    }else{
        $nama = $_GET['nama_produk'];
        $gambar = $_GET['gambar_produk'];
        $harga = $_GET['harga_produk'];
        
        $hasil1 = tambah($nama,$gambar,$harga);
        $sql   = "SELECT * FROM tb_order";
        $hasil = tampilSemuaProduk($sql);
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
    <title>Keranjang</title>
</head>
<body>
    <div class="container-fluid">

        <!-- navbar -->
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

        
        <div class="container">
            <div class="container-keranjang">
                <form action="prosesOrder.php" method="get">
                        <table class="pembayaran" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="4"><h3>Keranjang Belanja</h3></td>
                            </tr>
                            <tr class="title-kr">
                                <td>Produk</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Aksi</td>
                            </tr>
                            <?php $total = 0;?>
                            <?php foreach ($hasil as $row) :  ?>
                                <?php $total += $row ['harga_produk.order'];?>
                                <tr>
                                    <td class="img">
                                        <img src='<?php echo $location ?><?php echo $row['gambar_produk.order']?>' alt=''>
                                        <p><?php echo $row['nama_produk.order'] ?></p>
                                    </td>
                                    <td>
                                        <h3><?php echo number_format($row['harga_produk.order']) ?></h3>
                                    </td>
                                    <td>
                                        <input type="text" name="ker_jumlah">
                                    </td>
                                    <td>
                                        <a href="hapusOrder.php?id_order=<?php echo $row['id_order']?>" class="hapus-item">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                           <?php $kirim = 10000?>
                            <tr class="total-pembayaran">
                                <td colspan="3">Subtotal untuk produk</td>
                                <td >Rp. <?php echo number_format($total)?></td> 
                            </tr>
                            <tr class="total-pembayaran">
                                <td colspan="3">Subtotal untuk pengiriman</td>
                                <td >Rp. <?php echo number_format($kirim)?></td> 
                            </tr>
                            <tr class="hasil-total">
                                <td colspan="3"><h2>Total pembayaran</h2></td>
                                <td ><h3>Rp. <?php echo number_format($total+$kirim)?></h3></td> 
                            </tr>
                        </table>

                        <table class="info-pembayaran">
                            <tr class="info-pb">
                                <td colspan="3"><h3>Info Pembayaran</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label for="alamat">Alamat Pembayaran</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="text" name="alamat_pembeli" class="alamat-byr" id="alamat" placeholder="Masukan Alamat" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label for="diskon">Vocher Pembayaran</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="text" name="vocher_diskon" class="alamat-byr" id="diskon" placeholder="Masukan Kode Vocher" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Opsi Pembayaran</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="radio" name="opsi_pembayaran" id="BSI" value="BSI">
                                    <label for="BSI">BSI</label>
                                    <input type="radio" name="opsi_pembayaran" id="BNI" value="BNI">
                                    <label for="BNI">BNI</label>
                                    <input type="radio" name="opsi_pembayaran" id="BRI" value="BRI">
                                    <label for="BRI">BRI</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Opsi Pengiriman</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="radio" name="opsi_pengiriman" id="JNE" value="JNE">
                                    <label for="JNE">JNE</label>
                                    <input type="radio" name="opsi_pengiriman" id="JNT" value="JNT">
                                    <label for="JNT">JNT</label>
                                    <input type="radio" name="opsi_pengiriman" id="EXPRES" value="EXPRES">
                                    <label for="EXPRES">EXPRES</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit"> <a href="prosesOrder.php" class="btn-pesan">Buat Pesanan</a></button>
                                </td>
                            </tr>
                            
                        </table>

                </form>
            </div>
        </div>


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