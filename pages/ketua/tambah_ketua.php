<?php 
include '../header/header.php';
include '../header/config.php'; 
$acitvepage = basename( $_SERVER['PHP_SELF']);
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
                <label for="example-search-input" class="form-control-label">visi</label>
                <input class="form-control" type="text" value="" id="example-search-input" name="visi">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">misi</label>
                <input class="form-control" type="text" value="" id="example-email-input" name="misi">
                </div>
                <div class="form-group">
                <label for="example-url-input" class="form-control-label">foto</label>
                <input class="form-control" type="text" value="" id="example-url-input" name="foto">
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nama = $_POST['nama'];
                    $visi = $_POST['visi'];
                    $misi = $_POST['misi'];
                    $foto = $_POST['foto'];

                    $sql = "INSERT INTO ketua (nama, visi, misi, foto) VALUES ('$nama', '$visi', '$misi', '$foto')";
                    if (mysqli_query($koneksi, $sql)) {
                        echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'New record created successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'calon_ketua.php';
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
     