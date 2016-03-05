
<?php

    session_start();

    if (!(isset($_SESSION['login']) and $_SESSION['login']!='')) 
    {

        header ("Location: ../../../index.html");

    }

?>
?>
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sanitory_systems');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$table_number = $_GET["table_num"];
$table_name = $_GET["table_name"];
$user = $_GET["username"];
if($table_number==11)
{
	function NewUser()
	{
		$fullname = $_POST['workerId'];
		$userName = $_POST['Name'];
		$email = $_POST['Rating'];
		$password =  $_POST['Salary'];
	
		$query = "INSERT INTO workers (workerID,name,rating,salary) VALUES ('$fullname','$userName','$email','$password')";
			$data = mysql_query ($query)or die(mysql_error());
			echo $data;
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['workerId']) and !empty($_POST['Name']) and !empty($_POST['Rating']) and !empty($_POST['Salary']) )   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
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
}
else if($table_number==22)
{
	function NewUser()
	{
		$fullname = $_POST['supervisorId'];
		$userName = $_POST['Name'];
		$email = $_POST['Rating'];
		$password =  $_POST['Salary'];

		$query = "INSERT INTO supervisor (supervisorID,name,rating,salary) VALUES ('$fullname','$userName','$email','$password')";
		$data = mysql_query ($query)or die(mysql_error());
		echo $data;
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['supervisorId']) and !empty($_POST['Name']) and !empty($_POST['Rating']) and !empty($_POST['Salary']))  
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
}
else if($table_number==33)
{

	function NewUser()
	{
		$fullname = $_POST['Name'];
		$userName = $_POST['Number_of_workers'];
		$email = $_POST['Warden'];
		$password =  $_POST['Admin_warden'];

		$query = "INSERT INTO hostel (Name,No_of_workers,Warden,admin_warden) VALUES ('$fullname','$userName','$email','$password')";
		$data = mysql_query ($query)or die(mysql_error());
		echo $data;
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['Name']) and !empty($_POST['Number_of_workers']) and !empty($_POST['Warden']) and !empty($_POST['Admin_warden']))  
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
}
if($table_number==44)
{
	function NewUser()
	{
		$fullname = $_POST['Academic_year'];
		$userName = $_POST['Ragistrar'];
		$email = $_POST['Director'];
		$password =  $_POST['Agency_head'];
		$password1 =  $_POST['Agency_name'];
		$password2 =  $_POST['Ass_ragistrar'];
		$query = "INSERT INTO rate_contract (Academic_year,Ragistrar,Director,Agency_head,Agency_name,Ass_ragistrar) VALUES ('$fullname','$userName','$email','$password','$password1','$password2')";
		$data = mysql_query ($query)or die(mysql_error());
		echo $data;
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['Academic_year']) and !empty($_POST['Ragistrar']) and !empty($_POST['Director']) and !empty($_POST['Agency_head']) and !empty($_POST['Agency_name']) and !empty($_POST['Ass_ragistrar']))
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
}
if($table_number==55)
{
	function NewUser()
	{
		$fullname = $_POST['complaint'];
		$userName = $_POST['Student_name'];
		//$email = $_POST['Status'];
	
		$query = "INSERT INTO complaint (complaint,Student_name,Status) VALUES ('$fullname','$userName','Request Sent')";
		$data = mysql_query ($query)or die(mysql_error());
		echo $data;
	
	}
	
	function Formcheck()
	{
		$_POST['complaint'] = htmlspecialchars($_POST['complaint']);
		if(!empty($_POST['complaint']) and !empty($_POST['Student_name']) )
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
}

else{}
header("Location:index.php?name=$table_number & table=$table_name & username=$user");exit;
?>