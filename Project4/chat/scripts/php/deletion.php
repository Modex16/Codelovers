
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
if($table_number==11)
{
	function NewUser()
	{
		$fullname = $_POST['WorkerID'];
	
		$query = "DELETE FROM workers WHERE workerID=$fullname";
		$data = mysql_query ($query)or die(mysql_error());
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['WorkerID']))
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
		$fullname = $_POST['supervisorID'];
	
		$query = "DELETE FROM supervisor WHERE supervisorID=$fullname";
		$data = mysql_query ($query)or die(mysql_error());
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['supervisorID']))
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
		
		$query = "DELETE FROM hostel WHERE Name = '$fullname'";
		$data = mysql_query ($query)or die(mysql_error());
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['Name']))
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
else if($table_number==44)
{

	function NewUser()
	{
		$fullname = $_POST['Academic_year'];
		
		$query = "DELETE FROM rate_contract WHERE Academic_year = $fullname";
		$data = mysql_query ($query)or die(mysql_error());
		echo $data;
	}
	
	function Formcheck()
	{
		if(!empty($_POST['Academic_year']))
		{
			NewUser();
		}
		else
		{
			?>
			<script type="text/javascript">
			 window.alert("Incomplete Deletion");
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
		$fullname = $_POST['complaint_no'];
	
		$query = "DELETE FROM complaint WHERE complaint_no=$fullname";
		$data = mysql_query ($query)or die(mysql_error());
	
	}
	
	function Formcheck()
	{
		if(!empty($_POST['complaint_no']))
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