<?php
require_once 'koneksi.php';
$koneksi = koneksiProduk();

if(isset($_POST['submit'])){
    $nama = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['rypassword']);

    $cek_user = mysqli_query($koneksi,"SELECT * FROM tb_register WHERE username='$nama'");
    $cek_login = mysqli_num_rows($cek_user);
    
    if($cek_login > 0){
        echo "<script>
                alert('username telah terdaftar');
                window.location = 'register.php';
            </script>";
    }else{
        if($password != $password2){
            echo "<script>
                    alert('Konfirmasi password tidak sesuai');
                </script>";
        }else{
            mysqli_query($koneksi,"INSERT INTO tb_register VALUES('','$nama','$email','$password')");
            echo "<script>
                    alert('User crated');
                    window.location = 'index.php';
                </script>";
        }
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
                           <a href="cardKeranjang.php"> <span class="material-symbols-outlined card-shop">
                            shopping_cart
                            </span></a>
                        </li>
                        <li>
                            <a href="register.php" class="daftar">Daftar</a>
                            <a href="login.php" class="masuk">Masuk</a>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

        <div class="container">

            <div class="container-form">
                <h3>REGISTER</h3>
                <form action="" method="post">
                    <table >
                        <tr>
                            <td>
                                <label for="nama">Nama</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Masukan nama" name="username" id="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Email</label>
                            </td>
                            <td>
                                <input type="email" name="email" id="email" placeholder="Masukan email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="sandi">Kata sandi</label>
                            </td>
                            <td>
                                <input type="password" name="password" id="sandi" placeholder="Masukan katasandi">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="retypepass">Ketik ulang katasandi</label>
                            </td>
                            <td>
                                <input type="password" name="rypassword" id="retypepass" placeholder="Ketik ulang katasandi">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"> <a href="">Batal</a>
                            <button name="submit" type="submit" >Submit</button>
                            </td>
                        </tr>
                    </table>
                    
                </form>
            </div>

        </div>

    </div>
</body>
</html>