<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
<link href="./board.css" rel="stylesheet" />
    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 15px 10px;
	  color: black;
		height : 100px;

        }

        table.table2 tr {
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
   .read_btn {
            width: 700px;
            height: 100px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .read_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }

    </style>
</head>

<body>
    <?php
    session_start();
    $URL = "./login.html";
    if (!isset($_SESSION['userid'])) {
    ?>

        <script>
            alert("로그인이 필요합니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    }
    ?>
<section class="container">
 <header class="header">
      <div class="headerStyle">
        <div>
          <a href="./index.html">
            <img src="/jpg/zoha.png" width="200" height="60" />
          </a>
        </div>
        <div class="box">
          <div class="container-4">
            <input type="search" id="search" placeholder="Search" />
            <button class="icon"><i class="fa fa-search"></i></button>
          </div>
          <i class="fa fa-search"></i>
        </div>
 <div class="inp">
<?php
if(isset($_SESSION['userid'])){ ?>
<b><?php echo $_SESSION['userid']; ?></b>님 반갑습니다.<br/> <?php } ?>

          <a href="board.php">자유게시판</a>

         <?php
        if(isset($_SESSION['userid'])){ ?>
 <a href="./logout_action.php">로그아웃</a>
<br />

    <?php
    } else {
    ?>
 <a href="login.html">로그인</a>
        <br />
    <?php
    }
    ?>

        </div>
      </div>
    </header>
    <form method="post" action="write_action.php">
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr  style="background-color:rgb(218,223,236); width:100">
                <td>
			<table class="table2">
                        <tr>
                            <td>작성자</td>
                            <td><input type="hidden" name="name" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" size=87></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=100 rows=30></textarea></td>
                        </tr>
</table>
<div class="read_btn">
 <button class="read_btn1">작성</button>
</div>
          </td>
            </tr>
        </table>
</form>
<button class="read_btn1" onclick="location.href='./board.php'">목록</button>&nbsp;&nbsp;
</body>
</html>
