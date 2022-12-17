<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
 <link href="./board.css" rel="stylesheet" />

<style>
table {
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }


        .text {
            text-align: center;
            padding-top: 20px;
        }

        .text:hover {
            text-decoration: underline;
        }

        a:link {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
	a{
text-decoration: none;
color: inherit;
}

</style>
</head>

<body>
 <?php
    $connect = mysqli_connect('118.67.134.160', 'root', 'zoha!@#123', 'test') or die("connect failed");
    $query = "select * from board order by number desc";
    $result = mysqli_query($connect, $query);
    //$result = $connect->query($query);
    $total = mysqli_num_rows($result);
        session_start(); ?>
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

    <p style="font-size:25px; text-align:center"><b>게시판</b></p>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) { 
            ?>
                    <tr class="even">
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </tr>
                <?php
		$total--;
            }
                ?>
        </tbody>
    </table>

    <div class=text>
        <font style="cursor: pointer" onClick="location.href='./write.php'">글쓰기</font>
    </div>
</section>
</body>

</html>

