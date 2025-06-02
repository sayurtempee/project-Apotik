<?php 
$conn = mysqli_connect ('127.0.0.1','root','','apotek');

if($conn->connect_errno) {
 echo "Error : " . $conn->connect_errno;
}
?>