<!-- membuat koneksi ke database -->
<?php

$host="localhost";
$user="root";
$password="";
$db="crud";
// membuat variabel kn untuk dipakai sebagai koneksi ke database
$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>