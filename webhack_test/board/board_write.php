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
    <form name="form" action="board_write_chk.php" enctype="multipart/form-data" method="post">
      <table>
            <tr>
              <td colspan="2" align="center" bgcolor="#dfdfdf">
                <b>글 작성</b>
              </td>
            </tr>
            <tr>
              <td width=10% align="center"><b>제 목</b></td>
              <td width=80% ><input type="text" name="subject" id="subject" size=50></td>
            </tr>
            <tr>
              <td width=10% align="center"><b>내 용</b></td>
              <td width=80% ><textarea name="content" style="width: 500px;height: 150px;"></textarea></td>
            </tr>
             <tr>
              <td width=10% align="center"><b>파일 첨부</b></td>
              <td width=80% ><input type="file" name="image"></td>
            </tr>
            <tr>
              <td colspan="2" align="right">
                <input type="submit" value="저 장">
              </td>
            </tr>
      </table>
    </form>
  </div>

  <div class="clear"></div>
</div>
</body>
</html>
