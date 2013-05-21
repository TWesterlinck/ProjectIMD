<?php
    session_start();

    include_once("../classes/Db.class.php");
    include_once("../classes/Lists.class.php");
    include_once("../classes/Event.class.php");

	if(isset($_GET['list']))
                {
                        $_SESSION['listname'] = $_GET['list'];
                        $Event = new Event();
                        $res = $Event->getEvents();

                        //$feedback = array();
                                    
                        for ($i=0; $i < count($res); $i++) 
                        { 

                            $url="http://build.uitdatabank.be/api/event/".$res[$i]."?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";
                            $feedback['events'][] = json_decode(file_get_contents($url));
                            
                               
                            //echo "<li>".$info->event->eventdetails->eventdetail->title."</li>";
                           
                        }

                        //$feedback = json_decode($feedback, TRUE);
                        $feedback['success'] = 'ok';

                        header('Content-type: application/json');
                        echo json_encode($feedback);
                }

?>