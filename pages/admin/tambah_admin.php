<?php 
include '../header/header.php';
include '../header//config.php'; 
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
                <label for="example-text-input" class="form-control-label">username</label>
                <input class="form-control" type="text" value="" id="example-text-input"name="username">
                </div>
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">password</label>
                <input class="form-control" type="text" value="" id="example-search-input" name="password">
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">nama</label>
                <input class="form-control" type="text" value="" id="example-email-input" name="nama">
                </div>
                <div class="form-group">
                <label for="example-url-input" class="form-control-label">alamat</label>
                <input class="form-control" type="text" value="" id="example-url-input" name="alamat">
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];

                    $sql = "INSERT INTO admin (username, password, nama, alamat) VALUES ('$username', '$password', '$nama', '$alamat')";
                   
                    if (mysqli_query($koneksi, $sql)) {
                        echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'New record created successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'admin.php';
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
     