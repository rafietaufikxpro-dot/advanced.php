<?php 
include '../header/config.php';


// ambil id dari URL
$id = $_GET['id'] ?? null;

// ambil dari id
if($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id'");
    $siswa = mysqli_fetch_assoc($query);

    // mysqli_fetch_assoc mengambil satu baris data dari hasil query
}
// update data ketika form disubmit
{

    mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id'");
 if ($query) {
   header('Location: siswa.php');  
   exit; 
  }
}
include '../header/header.php';
?>

 
      