<?php
    session_start();
    include_once("classes/Db.class.php");
    include_once("classes/User.class.php");
    include_once("classes/Lists.class.php");
    include_once("classes/Event.class.php");


    if(!isset($_SESSION['email']))
    {
        header("Location: index.php");
    }


    $url="http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&regio=Provincie%20Antwerpen&heading=Muziek&format=json";
    $events = json_decode(file_get_contents($url));
    //echo $url;

   if(isset($_POST['btnSaveList']))
    {
        $checkbox = $_POST['checkbox']; //Titel van event word
        $countCheck = count($_POST['checkbox']);
        $listname = $_POST['listname'];

        $List = new Lists();
        $List->listname = $listname;
        $List->saveList();

        //

        for ($counter = 0; $counter < count($checkbox); $counter++) {           

            $Event = new Event();
            $Event->listname = $listname;
            $Event->cdbid = $checkbox[$counter];
            $Event->saveEvent();

        }

    }

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EventListener</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
</head>

<script>
$(document).ready(function() {
$("tr:nth-child(even)").addClass("even");

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


    <?php

        if($events)
        {
            echo "<form class='eventlist' method='post'>.
            <input type='submit' class='button' name='btnSaveList' value='Save List' />";
            echo "<input type='text' name='listname' placeholder='Name your list!'><br>";
                        echo "<table cellspacing='0' cellpadding='15'>
                            
                            <th width='15%'>Image</th>
                            <th width='55%'>Title</th>
                            <th width='15%'>Save List</th>
                            ";
                        
                        
                        foreach ($events as $eventKey => $event) {
                        
                            $title = $event->title;
                            $image = $event->thumbnail;
                            $cdbid = $event->cdbid;

                            //elke rij krijgt een record toegewezen met een checkbox
                        echo "<tr>
                                <td><img src='$image' /></td>
                                <td>$title</td>
                                <td><input type='checkbox' name='checkbox[]' id='checkbox[]'  value=$cdbid />
                             </tr>"; 
                        
                        }
                        
            echo "</table></form>";

        }

    ?>

</div>

<div id="backgroundPattern2">
</div>
<footer>



</footer>
</body>
</html>