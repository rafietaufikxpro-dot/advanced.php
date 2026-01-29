<?php 
include 'config.php';

// ambil id dari URL
$id = $_GET['id'] ?? null;

// ambil dari id
if($id) {
    $id = intval($id);
    $query = mysqli_query($koneksi, "SELECT * FROM ketua WHERE id_calon = $id");
    $siswa = mysqli_fetch_assoc($query);

    // mysqli_fetch_assoc mengambil satu baris data dari hasil query
}
// update data ketika form disubmit
if ($id) {
    mysqli_query($koneksi, "DELETE FROM ketua WHERE id_calon = $id");
   header('Location: calon_ketua.php');
   exit; 
}
include 'header.php';
?>
