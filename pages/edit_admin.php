<?php 
include 'config.php';

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
    $password = $_POST['password'] ?? 0;
    $nama = $_POST['nama'] ?? 0;
    $alamat = $_POST['alamat'] ?? 0;
    mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', alamat='$alamat' WHERE id_admin = '$id'");
   header('Location: admin.php');
   exit; 
}
include 'header.php';
?>

 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>data siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <form class="px-4"  method="POST">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">username</label>
                <input class="form-control" type="text" value="<?php echo $siswa['username'] ?? ''; ?>" id="example-text-input"name="username">
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
                <button class="btn btn-primary">Tambah</button>
            </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     