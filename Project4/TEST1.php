<?php

    session_start();

    if (!(isset($_SESSION['login']) and $_SESSION['login']!='')) //To check whether the session is active
        {

        header ("Location: index.html");

    }
$user = $_GET['username'];//get the username to print
echo "<html>";
echo "<head>
	<title> HOMEPAGE </title>
	<style>
	body{
		height:100%;
        width:100%;
        background-image:url(4.jpg);/*your background image*/  
        background-repeat:no-repeat;/*we want to have one single image not a repeated one*/   
        background-size:cover;/*this sets the image to fullscreen covering the whole screen*/  
  
	}
	a{
		text-align: right;

	}
	#logout{
		width: 100px;
		height: 50px;
		float: right;
		margin-right: 20px;
		margin-top:0px;
		font-size:20px;
		background-color: red;
	}
	#logout:hover{
		background-color: red;
	}
	#getlist{
		width :200px;	
	}
	#complaint:hover{
		background-color: green;
	}
      button{
      	height: 50px;
      	width: 15%;
      	font-size: 30px;
      	text-align: center;
      	background-color: grey;
      	border-radius: 10px 10px 10px 10px;
      }
      button:hover{
      	background-color: lightblue;
      	color: white;
      }
	</style>
</head>";
echo "<body >";//the description of various buttons on the page
echo "<p style=' color:white; float:left' > Welcome  <b>$user</b> </p>";
if($user!="admin"){
 echo "<h1 style='text-decoration:underline; color:yellow; text-align:center; float:center'> Welcome to the Sanitary Works Management System </h1>";}
 else{
 echo	"<h1 style='text-decoration:underline; color:yellow; text-align:center;float:center'> Welcome to the Sanitary Works Management System: Admin Mode </h1>";}

echo "<form method='post' action='logout.php' style='float:right'>
<button name='logout' value='logout' type='submit' id='logout'> Log Out </button><br><br><br><br>
</form>";
echo "<center><h2 style='text-decoration:underline;color:green;float:center'> Dashboard </h2></center>
<h3 style='color : orange'> Click here to get the Attendance of all the workers : </h3>";
//go on to the next pages
echo " <form  method='GET' action = 'chat/scripts/php/attendance.php?'> <input type='hidden' name='username' value='$user' /> <button > Attendance </button></form>";

echo " <form method='GET' action ='chat/scripts/php/index.php?'> <input type='hidden' name='name' value='11' /> <input type='hidden' name='table' value='workers' /> <input type='hidden' name='username' value='$user' /> <center><button > Workers </button></center><br></form>";

echo " <form method='GET' action ='chat/scripts/php/index.php?'> <input type='hidden' name='name' value='22' /> <input type='hidden' name='table' value='supervisor' /> <input type='hidden' name='username' value='$user' /><center><button > Supervisor</button></center><br></form>";

echo " <form method='GET' action ='chat/scripts/php/index.php?'> <input type='hidden' name='name' value='33' /> <input type='hidden' name='table' value='hostel' /><input type='hidden' name='username' value='$user' /> <center><button > Hostel </button></center><br></form>";

echo " <form method='GET' action ='chat/scripts/php/index.php?'> <input type='hidden' name='name' value='44' /> <input type='hidden' name='table' value='rate_contract' /> <input type='hidden' name='username' value='$user' /><center><button > Rate Contract </button></center><br></form>";

echo " <form method='GET' action ='chat/scripts/php/index.php?'> <input type='hidden' name='name' value='55' /> <input type='hidden' name='table' value='complaint' /><input type='hidden' name='username' value='$user' /> <center><button id='complaint' > Complaint </button></center><br></form>";

echo "</body>";
echo "</html>";