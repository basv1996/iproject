<?php

// online

	//define('DB_SERVER', 'localhost');
	//define('DB_USERNAME', 's21248');
	//define('DB_PASSWORD', '21248');
	//define('DB_DATABASE', '21248_Leerjaar2');

// lokaal

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'iprojectt');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>