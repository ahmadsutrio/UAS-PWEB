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
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
    <nav>
            <div class="cont-nav">
                <form action="cariProduk.php" method="post">
                    <a href="index.php" class="logo"><h2>Freshly Dropped</h2></a>
                    <ul class="menu">
                        <li><input type="teks" name="nama_produk" autocomplete="0ff"></li>
                        <li><button type="submit"><span class="material-symbols-outlined">
                            search
                            </span></button>
                        </li>
                        <li>
                           <a href=""> <span class="material-symbols-outlined card-shop">
                            shopping_cart
                            </span></a>
                        </li>
                        <li>
                            <a href="" class="daftar">Daftar</a>
                            <a href="" class="masuk">Masuk</a>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

        <div class="container">

            <div class="container-form">
                <h3>Tambah Produk</h3>
                <form action= "prosestambah.php" method="post">
                    <table>
                        <tr>
                            <td><label for="nama">Nama :</label></td>
                            <td><input type="text" name="nama_produk" id="nama"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="jn_produk">Jenis Produk</label></td>
                            <td>
                                <input type="radio" name="jenis_produk" value="buah" id="buah">
                                <label for="buah">buah</label><br><input type="radio" name="jenis_prouk" value="kacang" id="kacang">
                                <label for="kacang">kacang</label><br><input type="radio" name="jenis_prouk" value="sayur" id="sayur">
                                <label for="sayur">sayur</label><br><input type="radio" name="jenis_prouk" value="umbian" id="umbian">
                                <label for="umbian">umbian</label><br><input type="radio" name="jenis_prouk" value="beras" id="beras">
                                <label for="beras">beras</label><br><input type="radio" name="jenis_prouk" value="telur" id="telur">
                                <label for="telur">telur</label><br>
                                <input type="radio" name="jenis_prouk" value="daging" id="daging">
                                <label for="daging">daging</label><br>
                                <input type="radio" name="jenis_prouk" value="ikan" id="ikan">
                                <label for="ikan">ikan</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="harga">Harga Produk :</label></td>
                            <td><input type="text" name="harga_produk" id="nama"></td>
                        </tr>
                        <tr>
                            <td><label for="satuan">Satuan Produk :</label></td>
                            <td><input type="text" name="satuan_produk" id="satuan">/gram</td>
                        </tr>
                        <tr>
                            <td><label for="gambar">Gambar Produk:</label></td>
                            <td><input type="text" name="gambar_produk" id="gambar"> /png</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                            <a href="daftarSemuaProduk.php"> batal</a>
                                <button type="submit" value="submit">Submit</button>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>

        </div>

    </div>
</body>
</html>