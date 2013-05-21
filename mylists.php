<?php
    session_start(); 

    include_once("classes/Db.class.php");
    include_once("classes/User.class.php");
    include_once("classes/Lists.class.php");
    include_once("classes/Event.class.php");

    $_SESSION['user_id'] = $_GET['id'];
    $currentID = $_GET['id'];

    if(isset($_GET['listname'])){
    $_SESSION['listname'] = $_GET['listname'];
    //echo $_SESSION['listname'];

    /*$Event = new Event();
    $res = $Event->getEvents();
                
    for ($i=0; $i < count($res); $i++) { 
           echo $res[$i];
    }*/
                
    


    //var_dump($Event);
    }






?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EventListener</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 

<script type='text/javascript' src='http://code.jquery.com/jquery-1.4.2.js'></script>
<script type='text/javascript' src='js/formbox.js'></script>

</head>

<script>
$(document).ready(function() {
$("li:nth-child(even)").addClass("even");

 });


</script>

<body>

<?php include("/includes/include_nav.php") ?>
<div id="backgroundPattern1">
</div>

<div id="container">

	<div id="clear">
    <br />
    </div>
    <ul class="MyLists">
        <?php
            try
            {
                    $MyList = new Lists();
                    $res = $MyList->GetMyLists();
                    
                    foreach ($res as $r) {
                        echo  "<li><a class='listlink' data-list='".$r['list_name']."' href='mylists.php?id=".$currentID."&listname=".$r['list_name']."'>". $r['list_name'] . "</a></li>";
                    }
            }
            catch(Exception $e)
            {
                $error = $e->getMessage();
                echo $error;
            }
                    
        ?>
    </ul>

    <ul class="MyEvents">

    </ul>

    <div id="details">

        <h1 id="titel"></h1>
        <!--<img id="eventThumbnail" src="" alt="Event Image"/>-->
        <p id="description"></p>


    </div>


</div>

<div id="backgroundPattern2">
</div>
<footer>



</footer>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
    
</body>
</html>