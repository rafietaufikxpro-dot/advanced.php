<?php 
include 'config.php';

// ambil id dari URL
$id = $_GET['id'] ?? null;

// ambil dari id
if($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id'");
    $siswa = mysqli_fetch_assoc($query);

    // mysqli_fetch_assoc mengambil satu baris data dari hasil query
}
// update data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'] ?? 0;
    $kelas = $_POST['kelas'] ?? 0;
    $jurusan = $_POST['jurusan'] ?? 0;
    $alamat = $_POST['alamat'] ?? 0;
    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan', alamat='$alamat' WHERE id_siswa = '$id'");
   header('Location: siswa.php');
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
                <label for="example-text-input" class="form-control-label">nama</label>
                <input class="form-control" type="text" value="<?php echo $siswa['nama'] ?? ''; ?>" id="example-text-input"name="nama">
                </div>
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">kelas</label>
                <input class="form-control" type="text" value="<?php echo $siswa['kelas'] ?? ''; ?>" id="example-search-input" name="kelas">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">jurusan</label>
                <input class="form-control" type="text" value="<?php echo $siswa['jurusan'] ?? ''; ?>" id="example-email-input" name="jurusan">
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
     