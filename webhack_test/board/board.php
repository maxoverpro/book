<?php

session_start();

if (!isset($_SESSION['id'])) { 
  echo (" 
    <script>
    alert('게시판 접근 권한이 없습니다.\\n로그인하시기 바랍니다');
   location.href='./login.php';
    </script>"); 
} else {

  include "dbconfig.php";

  $dbcon = mysqli_connect($host,$user,$passwd,'webhack');
mysqli_query($dbcon,"set session character_set_connection=utf8;");
mysqli_query($dbcon,"set session character_set_results=utf8;");
mysqli_query($dbcon,"set session character_set_client=utf8;");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Max WebHacking Test Suite</title>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
<link rel="stylesheet" type="text/css" href="stylesheet.css"  media="all" />
</head>
<body>
<div id="wrapper">
  
  <div id="logo">
    <h1>Web hacking training</h1>
  </div>

  <div class="clear"></div>

<?php
include "menu.php";
?>

  <div class="clear"></div>
  <div class="content">
      <table border=1 width="100%">
            <tr>
              <td width=15% align="center"><b>번 호</b></td>
              <td width=70% align="center"><b>제 목</b></td>
              <td width=15% align="center"><b>작성자</b></td>
            </tr>
            <?php
                $query = "select no,subject,writer from board order by no desc";
				
                $result = mysqli_query($dbcon,$query);

                while ( $list = mysqli_fetch_object( $result ) )
                {
                   echo("
                    <tr>

                    <td width=15% align='center'>$list->no</td>
                    <td width=70% align='left'>&nbsp;<a href='board_show.php?no=$list->no'>$list->subject</a></td>
                    <td width=15% align='center'>$list->writer</td>
                    </tr>
                    ");
                }

                mysqli_close();
            ?>    
            <tr>
              <td colspan="3" align="right">
                <input type="button"  onclick="location.href='board_write.php'"; value="글쓰기">
              </td>
            </tr>
      </table>
  </div>

  <div class="clear"></div>

</div>
</body>
</html>
