<?php 
include '../header/header.php';
include '../header/config.php'; 
$activepage = basename( $_SERVER['PHP_SELF']);
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
                <input class="form-control" type="text" value="" id="example-text-input"name="nama">
                </div>
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">kelas</label>
                <input class="form-control" type="text" value="" id="example-search-input" name="kelas">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">jurusan</label>
                <input class="form-control" type="text" value="" id="example-email-input" name="jurusan">
                </div>
                <div class="form-group">
                <label for="example-url-input" class="form-control-label">alamat</label>
                <input class="form-control" type="text" value="" id="example-url-input" name="alamat">
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form>
                <?php
            $query = mysqli_query($koneksi, "SELECT * FROM siswa");
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nama = $_POST['nama'];
                    $kelas = $_POST['kelas'];
                    $jurusan = $_POST['jurusan'];
                    $alamat = $_POST['alamat'];

                    $sql = "INSERT INTO siswa (nama, kelas, jurusan, alamat) VALUES ('$nama', '$kelas', '$jurusan', '$alamat')";
                    if (mysqli_query($koneksi, $sql)) {
                        echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'New record created successfully',
                            icon: 'success',
                            timer: 2000,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'siswa.php';
                        });
                        </script>";
                      $success = true;

                    }
                }
                ?>     
                    
                    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     