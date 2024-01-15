<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>Max WebHacking Test Suite</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link rel='stylesheet' type='text/css' href='stylesheet.css'  media='all' />
</head>
<body>
<div id='wrapper'>
  
  <div id='logo'>
    <h1>Web hacking training</h1>
  </div>

  <div class='clear'></div>

<?php
include 'menu.php';
?>

  <div class='clear'></div>

<?php

@session_start();
$sid = $_SESSION['id'];
$sname = $_SESSION['name'];
$slevel = $_SESSION['level'];

if (!isset($_SESSION['id'])) { 
  echo (" 
     <div class='content'>
    <form name='form' action='login_chk.php' method='post'>
      <table>
            <tr>
              <td><b>ID</b></td>
              <td><input type='text' name='id' id='id'></td>
            </tr>
            <tr>
              <td><b>Password</b></td>
              <td><input type='text' name='pw' id='pw'></td>
            </tr>
            <tr>
              <td colspan='2' align='right'><input type='submit' value='로그인'></td>
            </tr>
      </table>
    </form>
  </div>
  "); 
} else {

  echo("
    <div class='content'>
    <form name='form' action='logout.php' method='post'>
     <b>- ID</b>: $sid<br><b>- Name :</b> $sname<br><b>- Level :</b> $slevel
     <br><br> <input type='submit' value='Logout'>
    </form>
  </div>");
  
  }
?>

  <div class='clear'></div>


</div>
</body>
</html>
