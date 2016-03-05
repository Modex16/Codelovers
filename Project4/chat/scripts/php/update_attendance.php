<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sanitory_systems');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$user = $_POST["username"];
	function NewUser()
	{
		$fullname = $_POST['Year'];
		$userName = $_POST['Month'];
		$email = $_POST['Date'];
		$password =  $_POST['WorkerID'];
	
		$query = "INSERT INTO attendance (Year,Month,Date,WorkerID) VALUES ('$fullname','$userName','$email','$password')";
			$data = mysql_query ($query)or die(mysql_error());
			echo $data;
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['Year']) and !empty($_POST['Month']) and !empty($_POST['Date']) and !empty($_POST['WorkerID']) )   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
		{
			NewUser();
		}
		else
		{
			?>
			<script type="text/javascript">
			 window.alert("Incomplete Insertion");
			 </script>
			 <?php
		}
	}
	Formcheck();
	header("Location:attendance.php?username=$user");exit;
?>