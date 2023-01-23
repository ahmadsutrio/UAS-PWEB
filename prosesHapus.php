<?php
    include('crudProduk.php');
    $id = $_GET['id_produk'];
    $nama = $_GET['nama_produk'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            width:800px;
            border: 1px solid black;
            text-align: center;
            margin: 0 auto;
        }
        .container h3{
            font-size:30px;
        }
        a{
            display:inline-block;
            background-color:red;
            color:white;
            border:0;
            width:70px;
            height:40px;
        }
        .cancel{
            background-color:green;
            color:white;
            border:0;
            width:70px;
            height:40px;
        }
    </style>
    <title>Proses Hapus</title>
</head>
<body>
    <div class="container">
        <h3>Apakah anda ingin menghapus produk dengan nama <?php echo $nama?></h3>
        <?php echo"
            <a href='konfirmasiHapus.php?id_produk=$id'>Ok</a>
            <a class='cancel'href='daftarSemuaProduk.php'>Cancel</a>
        ";?>
    </div>

</body>
</html>

