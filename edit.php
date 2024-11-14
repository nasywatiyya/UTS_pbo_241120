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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_barang'])) {
        $id_barang=input($_GET["id_barang"]);

        $sql="select * from tb_atiyyabarang where id_barang=$id_barang";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_barang=htmlspecialchars($_POST["id_barang"]);
        $nama_barang=input($_POST["nama_barang"]);
        $stok=input($_POST["stok"]);
        $harga_beli=input($_POST["harga_beli"]);
        $harga_jual=input($_POST["harga_jual"]);

        //Query update data pada tabel anggota
        $sql="update tb_atiyyabarang set
			nama_barang='$nama_barang',
			stok='$stok',
			harga_beli='$harga_beli',
			harga_jual='$harga_jual',
			where id_peserta=$id_peserta";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama barang:</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Stok:</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukan Stok" required/>
        </div>
        <div class="form-group">
            <label>Harga beli :</label>
            <input type="text" name="harga_beli" class="form-control" placeholder="Masukan Harga beli" required/>
        </div>
        <div class="form-group">
            <label>Harga jual:</label>
            <input type="text" name="harga_jual" class="form-control" placeholder="Masukan Harga jual" required/>
        </div>

        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>