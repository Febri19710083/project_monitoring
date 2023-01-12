<?php
include 'fungsi.php';


?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Rergister</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
   <div class="container mb-5">
      <div class=" text-center">
         <div class="mb-4">
            <img src="logo/logo2.png" alt="" class="" width="500px">
         </div>
      </div>
      <h1 class="text-center mt-4 mb-4">Menu Registrasi</h1>
      <div class="card m-auto shadow" style="max-width: 700px;">
         <div class="card-header bg-primary">
            <h2 class="text-center text-white">Silahkan Registrasi</h2>
         </div>
         <div class="card-body">
            <form action="" method="POST">
               <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama..." name="nama">
               </div>

               <div class="mb-3">
                  <label for="kelamin" class="form-label">Kelamin</label>
                  <select class="form-select" aria-label="Default select example" name="kelamin">
                     <option>Kelamin</option>
                     <option value="L">laki-laki</option>
                     <option value="P">Perempuan</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email">
               </div>

               <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
               </div>

               <div class="mb-3">
                  <label for="varifikasi" class="form-label">Verifikasi</label>
                  <input type="password" class="form-control" id="verifikasi" name="verifikasi">
               </div>

               <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
               </div>
               <button type="submit" class="btn btn-primary" name="register">Register</button>
            </form>
            <?php
            if (isset($_POST['register'])) {
               if (register($_POST) == true) {
                  echo "<script>alert('Registersi Sukses')</script>";
               } else {
                  echo "<script>alert('Data Gagal Di Simpan')</script>";
               }
            }

            ?>
         </div>
      </div>

   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>