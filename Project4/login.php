
<?php

    session_start();
    $user = $_GET['username'];
    echo $user;
    if (!(!(isset($_SESSION['login'])) and $_SESSION['login']!="")) 
    {

        header ("Location: TEST1.php?username=$user");

    }
    else
    	header("Location: index.html")

?>