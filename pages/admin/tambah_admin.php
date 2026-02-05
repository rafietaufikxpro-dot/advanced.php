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
            <form class="px-4"  method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="example-text-input" class="form-control-label">username</label>
                  <input class="form-control" type="text" value="" id="example-text-input"name="username" required>
                  </div>  
                   <div class="form-group">
                  <label for="example-text-input" class="form-control-label">email</label>
                  <input class="form-control" type="email" value="" id="example-text-input"name="email" required>
                  </div>  
                <div class="form-group">
                <label for="example-search-input" class="form-control-label">password</label>
                <input class="form-control" type="text" value="" id="example-search-input" name="password" required>
                 </div>
                <div class="form-group">
                <label for="example-email-input" class="form-control-label">nama</label>
                <input class="form-control" type="text" value="" id="example-email-input" name="nama" required>
                </div>
                  <div class="form-group">
                  <label for="example-url-input" class="form-control-label">alamat</label>
                  <input class="form-control" type="text" value="" id="example-url-input" name="alamat" required>
                  </div>
                  
                <div class="form-group">
                <label for="example-file-input" class="form-control-label">foto</label>
                <input class="form-control" type="file" value="" id="example-file-input" name="foto" accept="image/*" required>
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $foto = $_FILES['foto']['name'];
            // upload foto

                     $target_dir = "../../assets/img";
            // ambil data file foto
            $tmpfile = $_FILES['foto']['tmp_name'];

            // $_files['foto']['name'] untuk mendapatkan nama file
            // $_files['foto']['tmp_name'] untuk mendapatkan temporary file yang diupload

            // [foto] nama yg ada di form  . ['name'] untuk mengambil nama filenya
            // yang diupload dari komputer user
            // bikin target file tempat menyimpan foto

            $namabaru = time() . "_" . $foto; // agar nama file tidak sama

            // pindah file

            move_uploaded_file($tmpfile, $target_dir . "/" . $namabaru);

                    $sql = "INSERT INTO admin (username, password, email, nama, alamat, foto) VALUES ('$username', '$password', '$email', '$nama', '$alamat', '$namabaru')";
                   
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
     