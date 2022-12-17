<?php
$userid = $_POST["mb_id"];
$userpw = $_POST["mb_password"];

if(!$userid){
	echo "
	<script>
	alert('아이디를 입력하세요.');
	history.go(-1);
	</script>
	";
	exit;
	}
	if(!userpw){
	echo"
	<script>
	alert('비밀번호를 입력하세여.');
	</script>
	";
	exit;
	}
include_once("./connect.php");

$sql = "SELECT * FROM tb_user WHERE userid='$userid' and userpw='$userpw'";
$result =mysqli_query($conn,$sql);
$rowNum=mysqli_num_rows($result);

if(!$rowNum){
	echo"
	<script>
	alert('아이디와 비밀번호를 확인하세요.');
	history.back();
	</script>
	";
	exit;
}

$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

session_start();
$_SESSION['userid']=$row['userid'];
$_SESSION['userpw']=$row['userpw'];

echo"
	<script>
	 alert('로그인 성공');
	location.href='./indexlog.html';
	</script>
";
?>

