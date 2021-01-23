<?php

	include('sql/config.php');
	
	$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
	//!-- 채팅 데이터 테이블 생성
	$query[] = "DROP TABLE ".$config['table']['datas']."; ";
	$query[] = "CREATE TABLE ".$config['table']['datas']." (
		idx int(16) AUTO_INCREMENT PRIMARY KEY,
		timestamp varchar(64),
		sender varchar(64),
		txt varchar(64)
	);";
	$query[] = "TRUNCATE TABLE ".$config['table']['datas']."; ";
	for($i=0;$i<count($query);$i++)
	{
		mysqli_query($conn, $query[$i]);
	}
	mysqli_close($conn);

?>