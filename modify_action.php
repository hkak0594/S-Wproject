<?php
$connect = mysqli_connect('118.67.134.160', 'root', 'zoha!@#123', 'test') or die("connect failed");

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("./read.php?number=<?= $number ?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>
