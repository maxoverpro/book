<?php

include "dbconfig.php";

@session_start();

$subject = $_POST['subject'];
$content = $_POST['content'];

$sid = $_SESSION['id'];
$sname = $_SESSION['name'];
$slevel = $_SESSION['level'];

// DB Connect
$dbcon = mysqli_connect($host,$user,$passwd,'webhack');


mysqli_query($dbcon,"set session character_set_connection=utf8;");
mysqli_query($dbcon,"set session character_set_results=utf8;");
mysqli_query($dbcon,"set session character_set_client=utf8;");



$udir = "/var/www/html/pds/";
$ufile = $udir.basename($_FILES["image"]["name"]);

$filename = $_FILES['image']['name'];
$tfname = $_FILES['image']['tmp_name'];

$query = "insert into board(subject,content,file,writer,level) values ('$subject','$content','$filename','$sname',9);";

$result = mysqli_query($dbcon,$query);

if (move_uploaded_file($_FILES['image']['tmp_name'], $ufile)) {
   echo("
    <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
       <script>
            alert(\"전송 완료.\");
            location.href='board.php'; 
          </script>
      ");
}  else {
	 echo("<script>
            alert(\"전송 완료.\");
            location.href='board.php'; 
          </script>
      ");
}

mysqli_close($dbcon);
?>
