<?php
    session_start();
    include_once("classes/Db.class.php");
    include_once("classes/User.class.php");

    // Cookie voor "remember me"

    if(isset($_COOKIE['login']))
    {
        $cookieval = explode(',', $_COOKIE['name']);
        $_SESSION['name'] = $cookieval[0];
        $_SESSION['email'] = $cookieval[1];
        header('Location: loggedin.php');
    }

    // DETECTEER SIGN UP

    if(isset($_POST['btnSignup']))
    {
        try
        {
            $user = new User();
            $user->Name = htmlspecialchars($_POST['username']);
            $user->Email = htmlspecialchars($_POST['email']);
            $user->Password = $_POST['password'];
            $user->Register();
            
            if($user->CanLogin()){
                $_SESSION['name'] = $user->Name;
                $_SESSION['email'] = $user->Email;
            header('Location: loggedin.php');
            };
        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
        }
    }

    //DETECTEER SIGN IN

    if(isset($_POST['btnLogin']))
    {
        try
        {
            $user = new User();
            $user->Email = $_POST['email'];
            $user->Password = $_POST['password'];
            if($user->CanLogin()){
                $_SESSION['name'] = $user->Name;
                $_SESSION['email'] = $user->Email;
                $_SESSION['user_id'] = $user->ID;
            if($_POST['rememberme'] == "yes")
                {
                    setcookie("login", "$user->Name,$user->Email", time()+60*60*24);
                }
                
                //$_SESSION['login'] = 'true';
                header('Location: loggedin.php');
            };
        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
        }
    }




?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EventListener</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" />

    <script type='text/javascript' src='http://code.jquery.com/jquery-1.4.2.js'></script>
<script type='text/javascript' src='js/formbox.js'></script>


</head>

<body>

    <?php include("/includes/include_nav.php") ?>

    <?php 

    // Boodschap voor foute login

    if(isset($error))
    {
        echo "<p>".$error."</p>";
    } 
    
    ?>



    <div id="backgroundPattern1">
    </div>



    <div id="backgroundPattern2">
    </div>



<footer>
</footer>


</body>
</html>