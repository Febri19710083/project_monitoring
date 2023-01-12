<?php
include '../fungsi.php';
$page = 'progress';
if (!isset($_SESSION['LOGIN']) == true) {
   header("location:../login.php");
}
$project = tampil('project');
?>

<?php include '../komponen/header.php'  ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="container">

      <div class="fst-italic fw-bold mt-3">
         <h1 style="font-size: 50px; color:rgb(4,15,74)">My Project</h1>
      </div>
      <div class="d-flex mt-4">
         <a href="add.php" class="btn text-white" style="background-color: navy;">Create New Project</a>
      </div>
      <div class="rounded-2 w-75">
         <table class="table mt-3 rounded-2">
            <tr style="background-color: #ebecf0;">
               <th>PROJECT NAME</th>
               <th>PROGRESS</th>
               <th>ACTION</th>
            </tr>
            <?php foreach ($project as $value) : ?>
               <tr>
                  <td><?= $value['name']; ?></td>
                  <td>
                     <div class="progress mt-2 d-d-inline" style="height: 10px;" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar <?= $value['progres'] == 100 ? 'bg-success' : '' ?>" style="width: <?= $value['progres'] ?>%"></div>
                     </div>
                     <div class="d-inline"><?= $value['progres'] ?>%</div>
                  </td>
                  <td>
                     <div class="d-flex gap-1">
                        <a class="btn btn-primary" href="edit.php?id=<?= $value['id'] ?>" >
                           <div class="">
                              UPDATE PROGRESS
                           </div>
                        </a>
                     </div>
                  </td>

               </tr>
            <?php endforeach  ?>

         </table>
      </div>

   </div>
</main>
<?php include '../komponen/footer.php'  ?>