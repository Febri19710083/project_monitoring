<?php
include '../fungsi.php';
$id = $_GET['id'];
$project = show('project', $id);
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
         <h1 style="font-size: 50px; color:rgb(4,15,74)"> Update Project</h1>
      </div>
      <div class="card w-75">
         <div class="card-header">
            <h3>Progress Project</h3>
         </div>
         <div class="card-body">
            <form action="" method="POST">
               <div class="progress mt-2 d-d-inline" style="height: 20px;" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar <?= $project['progres'] == 100 ? 'bg-success' : '' ?>" style="width: <?= $project['progres'] ?>%">
                  </div>
               </div>
               <div class="fs-2"><?= $project['progres'] ?>%</div>

               <div class="mb-3">
                  <input type="hidden" value="<?= $project['id'] ?>" name="id">
                  <input type="number" max="100" placeholder="Max Value 100" class="form-control w-50" name="progress" id="name" value="<?= $project['name'] ?>">
               </div>
               <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
            </form>
         </div>
      </div>
   </div>
</main>
<?php include '../komponen/footer.php';

if (isset($_POST['update'])) {
   if (edit_progress($_POST) > 0) {
      echo "<script>alert('Data Berhasi di Update');location='index.php';</script>";
   } else {
      echo "<script>alert('Data gagal di Update')</script>";
      echo mysqli_error($conn);
   }
}


?>