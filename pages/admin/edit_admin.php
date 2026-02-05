<?php 
include '../header/config.php';
include '../header/header.php';
$acitvepage = basename( $_SERVER['PHP_SELF']);
// ambil id dari URL
$id = $_GET['id'] ?? null;

// ambil dari id
if($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
    $siswa = mysqli_fetch_assoc($query);

    // mysqli_fetch_assoc mengambil satu baris data dari hasil query
}
// update data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? 0;
    $email = $_POST['email'] ?? 0;
    $password = $_POST['password'] ?? 0;
    $nama = $_POST['nama'] ?? 0;
    $alamat = $_POST['alamat'] ?? 0;
    $foto = $_FILES['foto'] ?? 0;

      if ($_FILES['foto']['name']) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    // upload foto

    $target_dir = "../../assets/img/";
    // ambil data file foto

    move_uploaded_file($tmp, $target_dir . "/" . $foto);

    $sql = "UPDATE admin SET foto='$foto', nama='$nama', email='$email', alamat='$alamat'  WHERE id_admin = '$id'";
  } else {
    $sql = "UPDATE admin SET nama='$nama', email='$email', alamat='$alamat' WHERE id_admin = '$id'";
  }
  
   if(mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', email='$email', alamat='$alamat', foto='$foto' WHERE id_admin = '$id'")) {
      echo "<script>
      Swal.fire({
          title: 'Success!',
          text: 'Data berhasil diupdate',
          icon: 'success',
          timer: 2000,
          showConfirmButton: true,
          confirmButtonText: 'OK'
        }).then(() => {
          window.location.href = 'admin.php';
        });
        </script>";
          $success = true;
      }
}

?>

 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>data siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <form class="px-4" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">username</label>
                <input class="form-control" type="text" value="<?php echo $siswa['username'] ?? ''; ?>" id="example-text-input"name="username">
                </div>
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">email</label>
                <input class="form-control" type="text" value="<?php echo $siswa['email'] ?? ''; ?>" id="example-text-input"name="email">
                </div>
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">password</label>
                <input class="form-control" type="text" value="<?php echo $siswa['password'] ?? ''; ?>" id="example-search-input" name="password">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">nama</label>
                <input class="form-control" type="text" value="<?php echo $siswa['nama'] ?? ''; ?>" id="example-email-input" name="nama">
                </div>
             
                <div class="form-group">
                <label for="example-url-input" class="form-control-label">alamat</label>
                <input class="form-control" type="text" value="<?php echo $siswa['alamat'] ?? ''; ?>" id="example-url-input" name="alamat">
                </div>
                   <div class="form-group">
                <label for="example-url-input" class="form-control-label">foto</label>
                <img src="../../assets/img/<?php echo $siswa['foto']; ?>" class="avatar avatar-sm me-3" alt="user1">
                <input class="form-control" type="file" value="<?php echo $siswa['foto'] ?? ''; ?>" id="example-url-input" name="foto">
                </div>
                <button class="btn btn-primary">Update</button>
            </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     