<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input class="a"type="text" name="jumlah">
        <button onclick="b()">submit</button>
    </form>
    <?php
    $g = $_POST['jumlah'];
    $b = 10;
    $hasil = '<script>

            function b(){
                var a = parseInt(document.querySelector(".a").value);
        
               
                // document.write(a);          
            }

    </script>';
    echo $hasil; 
    $hasil2 = (int) $hasil;
    echo $b+$g;
    // echo $hasil3;
    
    ?>
</body>

</html>