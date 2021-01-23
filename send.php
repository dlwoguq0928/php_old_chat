<!-- 채팅 전송 -->
<?php
	if (isset($_POST['txt']))
	{
		$timestamp = time();
		$sender = $_SERVER["REMOTE_ADDR"];
		$txt = $_POST['txt'];
		
		if ($txt != '')
		{
			include('php/sql/config.php');
			$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
			$query = "INSERT INTO ".$config['table']['datas']." (timestamp, sender, txt) VALUES ('$timestamp', '$sender', '$txt'); ";
			mysqli_query($conn, $query);
			mysqli_close($conn);
		}
	}
?>
<!-- 채팅 전송 END -->