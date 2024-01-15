<?php
	session_start();
	session_destroy();
	echo("
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
		<script>
	alert('로그아웃 되었습니다.');
	location.href='index.php'; 
	</script>
	");
?>