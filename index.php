<!DOCTYPE html>
<html>
<head>
    <!-- design css dari bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Rifqi Fauzan_51421316</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">CRUD DATA MAHASISWA</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DATA MAHASISWA UNIVERSITAS GUNADARMA</center></h4>
<?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['npm'])) {
        $npm=htmlspecialchars($_GET["npm"]);
        //Query delete untuk menghapus data dari tabel mahasiswa
        $sql="delete from mahasiswa where npm='$npm' ";
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
        <!-- membuat tampilan tabel mahasiswa -->
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";
        //Query untuk menampilkan data mahasiswa dari database
        $sql="select * from mahasiswa order by npm desc";
        //Include file koneksi, untuk koneksikan ke database
        $hasil=mysqli_query($kon,$sql);
        // memberikan value awal 0 pada no
        $no=0;
        // membuat perulangan agar setiap data bertambah value dari no bertambah 1
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <!-- menentukan data apa saja yang akan diisikan setiap kolomnnya, tulis dengan urut -->
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["fakultas"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <!-- pembuatan button update dan delete -->
                    <a href="update.php?npm=<?php echo htmlspecialchars($data['npm']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?npm=<?php echo $data['npm']; ?>" 
                    class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
