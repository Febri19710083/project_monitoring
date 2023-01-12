<?php
session_start();
if (!isset($_SESSION['LOGIN']) == true) {
   header("location:login.php");
} else {
   header("location:dashboard/");
}
