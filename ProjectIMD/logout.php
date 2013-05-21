<?php
	include_once("classes/Db.class.php");
	session_start();
	session_destroy();

	setcookie("login", "$user->Name,$user->Email", time() -3600);

    header("Location: index.php");
    exit();


?>