<?php 
session_start();
$conn = mysqli_connect('localhost','root','', 'app');

function register($data)
{
   global $conn;
   // tangkap data
   $nama = $data['nama'];
   $kelamin = $data['kelamin'];
   $email = $data['email'];
   $verifikasi = $data['verifikasi'];
   $password = $data['password'];

   // validasi verifiaksi salah
   if ($password !== $verifikasi) {
      echo "<script> alert('Verifikasi Password Salah');</script>";
      return false;
   }

   // enkrpsi Password
   $password = password_hash($password, PASSWORD_DEFAULT);

   // Jika Username/Email sama 
   $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
   if (mysqli_num_rows($result) > 0) {
      echo "<script> alert('Email Sudah Di gunakan..!');</script>";
      return false;
   }

   // simpan data
   $query = "INSERT INTO user VALUES('','$nama','$kelamin','$email','$password')";
   mysqli_query($conn, $query);

   header('location:login.php');
   return mysqli_affected_rows($conn);
}

// tampil data
function tampil($table)
{
   $query = "SELECT * FROM $table";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}

function show($table,$id)
{
   $query = "SELECT * FROM $table WHERE id='$id'";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows[0];
}


function upload()
{
   $nama_file = $_FILES['gambar']['name'];
   $tipe_file = $_FILES['gambar']['type'];
   $tmp_name = $_FILES['gambar']['tmp_name'];
   $size = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];

   //cek apakah ada gambar yang di upload
   if ($error === 4) {
      echo "<script>alert('tidak ada gambar yang di upload')</script>";
      return false;
   }
   //cek tipe file
   $ekstiensi_file_falid = ['jpeg', 'jpg', 'png'];
   $ekstesiFile = explode(".", $nama_file);
   $ekstesiFile = strtolower(end($ekstesiFile));
   if (!in_array($ekstesiFile, $ekstiensi_file_falid)) {
      echo "<script>alert('yang anda upload bukan gamber')</script>";
      return false;
   }

   //cek ukuran file
   if ($size > 1500000) {
      echo "<script>alert('tidak Ukuran file terlau bersar')</script>";
      return false;
   }
   //jika lolos dari pengecerkan
   move_uploaded_file($tmp_name, "../leader-img/" . $nama_file);
   return $nama_file;
}

function tambah_project($data)
{
   global $conn;

   // tangkap data
   $nama = $data['name'];
   $id_client= $data['id_client'];
   $leader= $data['leader'];
   $img = upload();
   $start = $data['start'];
   $end = $data['end'];
  

   $query = "INSERT into project VALUES('','$id_client','$nama','$leader','$img','$start','$end','0')";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

//fungsi ubah produk
function edit_project($data)
{
   global $conn;
   $id = $data['id'];
   $gambar_terdahulu = $data['img_old'];
   $nama = $data['name'];
   $id_client = $data['id'];
   $leader = $data['leader'];
   $gambar = upload();
   $start = $data['start'];
   $end = $data['end'];

   if ($_FILES['gambar']['error'] === 4) {
      $gambar = $gambar_terdahulu;
   } else {
      $gambar = upload();
   }
   mysqli_query($conn, "UPDATE project SET id_client='$id_client', name ='$nama', leader='$leader',img_leader='$gambar', start_date='$start', end_date='$end' WHERE id ='$id'");
   return mysqli_affected_rows($conn);
}

function edit_progress($data)
{
   global $conn;
   $id = $data['id'];
   $progress = $data['progress'];
  
   mysqli_query($conn, "UPDATE project SET progres='$progress' WHERE id ='$id'");
   return mysqli_affected_rows($conn);
}


// tambah client
function tambah_client($data)
{
   global $conn;

   // tangkap data
   $nama = $data['name'];
   $email = $data['email'];
   $address = $data['address'];

   $query = "INSERT into client VALUES('','$nama','$email','$address')";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}


function edit_client($data)
{
   global $conn;

   // tangkap data
   $nama = $data['name'];
   $email = $data['email'];
   $address = $data['address'];
   $id = $data['id'];

   $query = "UPDATE client SET name='$nama', email='$email', address='$address' WHERE id ='$id' ";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}



function login($data)
{
   global $conn;

   $email = $data['email'];
   $password = $data['password'];

   $result = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
   $row = mysqli_fetch_assoc($result);

   if (mysqli_affected_rows($conn) > 0) {
      if (password_verify($password, $row['password'])) {
         $_SESSION['LOGIN'] = true;
         return true;
      }
   } else {
      return false;
   }

}