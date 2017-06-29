<?php

// online

	//define('DB_SERVER', 'localhost');
	//define('DB_USERNAME', '********');
	//define('DB_PASSWORD', '*******');
	//define('DB_DATABASE', '********');

// lokaal

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'iprojectt');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
