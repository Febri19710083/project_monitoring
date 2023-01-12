<?php 
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'app');
mysqli_query($conn, "DELETE FROM project WHERE id = '$id'");
echo "<script>alert('data deleted successfully');location.href='index.php'</script>";
?>