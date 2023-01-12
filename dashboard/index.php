<?php
include '../fungsi.php';
$page = 'dashboard';
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

      <div class="rounded-2">
         <table class="table mt-3 rounded-2">
            <tr style="background-color: #ebecf0;">
               <th>PROJECT NAME</th>
               <th>CLIENT</th>
               <th>PORJECT LEADER</th>
               <th>START DATE</th>
               <th>END DATE</th>
               <th>PROGRESS</th>

            </tr>
            <?php foreach ($project as $value) : ?>
               <tr>
                  <td><?= $value['name']; ?></td>
                  <td>Kemenag</td>
                  <td>
                     <div class="d-flex gap-2 align-items-center">
                        <div style="width: 40px; height: 40px; background-image: url(../leader-img/<?= $value['img_leader']; ?>); background-repeat: no-repeat; background-size: cover; " class="rounded-circle bg-primary">
                        </div>
                        <div class="">
                           <?= $value['leader']; ?>
                        </div>
                     </div>
                  </td>
                  <td><?= $value['start_date']; ?></td>
                  <td><?= $value['end_date']; ?></td>
                  <td>
                     <div class="progress mt-2 d-d-inline" style="height: 8px;" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar <?= $value['progres'] == 100 ? 'bg-success' : '' ?>" style="width: <?= $value['progres'] ?>%"></div>
                     </div>
                     <div class="d-inline"><?= $value['progres'] ?>%</div>
                  </td>


               </tr>
            <?php endforeach  ?>

         </table>
      </div>

   </div>
</main>
<?php include '../komponen/footer.php'  ?>