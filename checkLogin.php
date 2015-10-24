<?php
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$data = json_decode(file_get_contents('users.txt'), true);
	foreach($data as $item){
		if($username == $item['name'] && $password == $item['password'])
		{
			echo 1;
		}
	}

	// var_dump($username);
	// <br>
	// var_dump($password);
?>