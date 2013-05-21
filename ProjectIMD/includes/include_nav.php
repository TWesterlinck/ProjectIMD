<header>

	<a href="loggedin.php"><img id="logo" alt="Logo EventListener" src="images/projectLogo.png" /></a>
    
    <nav>
        <ul>
            <li><a id="mainlink" href="#">EventListener</a>
                <ul>
                    <li><a href="#">Find Lists</a></li>
                    <li><a href="loggedin.php">Create Lists</a></li>
                    <li><a href="mylists.php?id=<?php echo $_SESSION['user_id'] ?>">My lists</a></li>"
                </ul>
            </li>
        </ul>
    </nav>


    <?php 

    if(!isset($_SESSION['email']))
    {
     
        include("/includes/include_login.php");

    }
    else if(isset($_SESSION['email']))
    {
        echo "<a id='logout' href='logout.php'>Logout</a>";
        echo "<p id='welcome'>Welcome ".$_SESSION['name']."</p>";
    }


    ?>



</header>