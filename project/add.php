<?php
include '../fungsi.php';
$page = 'project';
if (!isset($_SESSION['LOGIN']) == true) {
   header("location:../login.php");
}
$project = tampil('project');
$client = tampil('client');
?>

<?php include '../komponen/header.php'  ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="container">

      <div class="fst-italic fw-bold mt-3">
         <h1 style="font-size: 50px; color:rgb(4,15,74)">ADD Project</h1>
      </div>
      <div class="card w-75 mt-4 mb-5 shadow">
         <div class="card-header">
            <h3>Form Add Project</h3>
         </div>
         <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
               <div class="mb-3">
                  <label class="form-label" for="name">Project Name</label>
                  <input type="text" class="form-control" name="name" id="name">
               </div>
               <div class="mb-3">
                  <label for="client">Client</label>
                  <select class="form-select" aria-label="Default select example" name="id_client">
                     <option selected>Open this select Client</option>
                     <?php foreach ($client as $value) :  ?>
                        <option value="<?= $value['id'] ?>"><?= $value['name']; ?></option>
                     <?php endforeach  ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="leader">Project Leader</label>
                  <input type="text" class="form-control" name="leader" id="leader">
               </div>
               <div class="mb-3">
                  <label class="form-label" for="start">Start Date</label>
                  <input type="date" class="form-control" name="start" id="start">
               </div>
               <div class="mb-3">
                  <label class="form-label" for="end">End Date</label>
                  <input type="date" class="form-control" name="end" id="end">
               </div>

               <div class="mb-3">
                  <label for="formFile" class="form-label">Img Leader</label>
                  <input class="form-control" type="file" id="formFile" name="gambar">
               </div>
               <button class="btn btn-secondary" type="submit" name="tambah">Create</button>
            </form>
         </div>
      </div>

   </div>
</main>
<?php include '../komponen/footer.php'  ?>
<?php
if (isset($_POST['tambah'])) {
   if (tambah_project($_POST) > 0) {
      echo "<script>alert('Data Berhasi DI tambah');location='index.php';</script>";
   } else {
      echo "<script>alert('Data gagal di tambahkan')</script>";
      echo mysqli_error($conn);
   }
}
?>