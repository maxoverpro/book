<?php

include "dbconfig.php";

$id = $_POST['id'];
$pw = $_POST['pw'];

// DB Connect
$dbcon = mysqli_connect($host,$user,$passwd, $dbname );
if ($dbcon){
  echo "DB 연결 성공<p>";
} else {
  echo "DB 연결 실패<p>";
}

$query = "select id,pw,name,level from member WHERE id = '$id' and pw='$pw'";

$result = mysqli_query($dbcon,$query);

$rowcount = mysqli_num_rows($result);

if($rowcount > 0)
{

  session_start();
  
  $row = mysqli_fetch_assoc($result);

  $_SESSION['id'] = $id;
  $_SESSION['name'] = $row['name'];
  $_SESSION['level'] =$row['level'];

	echo("
    <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
		   <script>
       			alert(\"pass\");
       			location.href='index.php'; 
       		</script>
   		");
}
else
{
	echo("
     <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
		   <script>
       			alert(\"fail\");
       			window.history.go(-1);
       </script>
  ");
}

mysqli_close($dbcon);


?>
