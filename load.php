<!-- 채팅 표시 -->
<?php
	include('php/sql/config.php');
	$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
	$query = "SELECT * FROM ".$config['table']['datas'].";";
	$result = mysqli_query($conn, $query);
	$n = 0;
	while($row = mysqli_fetch_array($result))
	{
		$sender = $row['sender'];
		$txt = $row['txt'];
		
		$yy = 32+64*$n;
		$css = ($sender == $_SERVER["REMOTE_ADDR"]) ? 'bubble-me' : 'bubble-you';
		$content = ($sender == $_SERVER["REMOTE_ADDR"]) ? "$txt" : "$sender) $txt";
		
		echo "
			<div class='$css' style='top: ".$yy."px;'>
				$content
			</div>
			
			<!-- 하드코딩 -->
			<div style='position:absolute; top: ".($yy + 96)."px;'>　</div>
		";
		$n ++;
	}
	mysqli_close($conn);
?>
<!-- 채팅 표시 END -->