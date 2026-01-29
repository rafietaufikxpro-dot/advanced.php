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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama'] ?? '');
    $visi = mysqli_real_escape_string($koneksi, $_POST['visi'] ?? '');
    $misi = mysqli_real_escape_string($koneksi, $_POST['misi'] ?? '');
    $foto = mysqli_real_escape_string($koneksi, $_POST['foto'] ?? '');
    $id = intval($id);
    mysqli_query($koneksi, "UPDATE ketua SET nama='$nama', visi='$visi', misi='$misi', foto='$foto' WHERE id_calon = $id");
   header('Location: calon_ketua.php');
   exit; 
}
include 'header.php';
?>

 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>data calon ketua</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <form class="px-4"  method="POST">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">nama</label>
                <input class="form-control" type="text" value="<?php echo $siswa['nama'] ?? ''; ?>" id="example-text-input" name="nama">
                </div>
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">visi</label>
                <input class="form-control" type="text" value="<?php echo $siswa['visi'] ?? ''; ?>" id="example-search-input" name="visi">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">misi</label>
                <input class="form-control" type="text" value="<?php echo $siswa['misi'] ?? ''; ?>" id="example-email-input" name="misi">
                </div>
                <div class="form-group">
                <label for="example-url-input" class="form-control-label">foto</label>
                <input class="form-control" type="text" value="<?php echo $siswa['foto'] ?? ''; ?>" id="example-url-input" name="foto">
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     