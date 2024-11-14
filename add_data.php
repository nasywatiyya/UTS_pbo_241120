<!DOCTYPE html>
<html>
<head>
    <title>Form Restock Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "database.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_barang=input($_POST["nama_barang"]);
        $stok=input($_POST["stok"]);
        $harga_beli=input($_POST["harga_beli"]);
        $harga_jual=input($_POST["harga_jual"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tb_atiyyabarang (nama_barang,stok,harga_beli,harga_jual) values
		('$nama_barang','$stok','$harga_beli','$harga_jual')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Nama barang:</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama barang" required/>
        </div>
       <div class="form-group">
            <label>Stok :</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukan Stok" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Harga beli:</label>
            <input type="text" name="harga_beli" class="form-control" placeholder="Masukan Harga Beli" required/>
        </div>
        <div class="form-group">
            <label>Harga Jual:</label>
            <textarea name="harga_jual" class="form-control" rows="5"placeholder="Masukan harga jual" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>