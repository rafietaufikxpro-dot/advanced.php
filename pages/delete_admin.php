<?php 
include 'config.php';

// ambil id dari URL
$id = $_GET['id'] ?? null;

// ambil dari id
if($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
    $admin = mysqli_fetch_assoc($query);

    // mysqli_fetch_assoc mengambil satu baris data dari hasil query
}
// update data ketika form disubmit
if ($id) {
    
    mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id'");
   header('Location: admin.php');  
   exit; 
}
include 'header.php';
?>

 
      