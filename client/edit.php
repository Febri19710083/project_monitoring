<?php
include '../fungsi.php';
$id = $_GET['id'];
$client = show('client', $id);
$page = 'client';
$no = 1;
if (!isset($_SESSION['LOGIN']) == true) {
   header("location:../login.php");
}

?>

<?php include '../komponen/header.php'  ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="container">
      <div class="fst-italic fw-bold mt-3 mb-4">
         <h1 style="font-size: 50px; color:rgb(4,15,74)"> Add Client</h1>
      </div>
      <div class="card">
         <div class="card-header">
            <h3>Add New Client</h3>
         </div>
         <div class="card-body">
            <form action="" method="POST">
               <div class="mb-3">
                  <input type="hidden" value="<?= $client['id'] ?>" name="id">
                  <label class="form-label" for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?= $client['name'] ?>">
               </div>
               <div class=" mb-3">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?= $client['email'] ?>">
               </div>
               <div class=" mb-3">
                  <label class="form-label" for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" value="<?= $client['address'] ?>">
               </div>
               <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
            </form>
         </div>
      </div>
   </div>
</main>
<?php include '../komponen/footer.php';

if (isset($_POST['update'])) {
   if (edit_client($_POST) > 0) {
      echo "<script>alert('Data Berhasi di Update');location='index.php';</script>";
   } else {
      echo "<script>alert('Data gagal di Update')</script>";
      echo mysqli_error($conn);
   }
}


?>