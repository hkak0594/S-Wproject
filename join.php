<?php

include_once("./connect.php");

$userid = $_POST["mb_id"];
$userpw = $_POST["mb_password"];
$username = $_POST["mb_nick"];
$useremail = $_POST["mb_email"];

$sql = "INSERT INTO tb_user (userid, userpw, username, useremail) VALUES('$userid','$userpw','$username','$useremail')";

if($conn->query($sql))echo "<script>alert('회원가입성공');</script>";
else echo "<script>alert('회원가입 실패');</script>";

echo "<script>location.href='./index.html'</script>";
?>

