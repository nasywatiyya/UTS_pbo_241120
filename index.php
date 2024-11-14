<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Atiyya's bookstore</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">bookstore</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR BUKU</center></h4>
<?php

    include "database.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_barang'])) {
        $id_barang=htmlspecialchars($_GET["id_barang"]);

        $sql="delete from tb_atiyyabarang where id_barang='$id_barang' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>Id barang</th>
            <th>Nama barang</th>
            <th>Stok</th>
            <th>Harga beli</th>
            <th>Harga jual</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "database.php";
        $sql="select * from tb_atiyyabarang order by id_barang desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["stok"];   ?></td>
                <td><?php echo $data["harga_beli"];   ?></td>
                <td><?php echo $data["harga_jual"];   ?></td>
                <td>
                    <a href="edit.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="add_data.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
