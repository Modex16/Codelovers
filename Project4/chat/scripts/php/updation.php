
<?php

    session_start();

    if (!(isset($_SESSION['login']) and $_SESSION['login']!='')) 
    {

        header ("Location: ../../../index.html");

    }

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
		$fullname = $_POST['workerId'];
		$userName = $_POST['Name'];
		$email = $_POST['Rating'];
		$password =  $_POST['Salary'];
		$query = "UPDATE workers
		SET name='$userName', rating = $email, salary = $password
		WHERE workerId=$fullname";
		$data = mysql_query ($query) or die(mysql_error());
		echo $data;
	}

	function Formcheck()
	{
		if(!empty($_POST['workerId']))
		{
			NewUser();
		}
		else
		{
			?>
			<script type="text/javascript">
			 window.alert("Incomplete Updation");
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
		$query = "UPDATE supervisor
		SET name='$userName', rating = $email, salary = $password
		WHERE supervisorID=$fullname";
		$data = mysql_query ($query) or die(mysql_error());
		echo $data;
	}

	function Formcheck()
	{
		if(!empty($_POST['supervisorId']))
		{
			NewUser();
		}
		else
		{
			?>
			<script type="text/javascript">
			 window.alert("Incomplete Updation");
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
		$query = "UPDATE hostel
		SET No_of_workers=$userName,  Warden= '$email', admin_warden = '$password'
		WHERE Name='$fullname'";
		$data = mysql_query ($query) or die(mysql_error());
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
			 window.alert("Incomplete Updation");
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
		$userName = $_POST['Ragistrar'];
		$email = $_POST['Director'];
		$password =  $_POST['Agency_head'];
		$password1 =  $_POST['Agency_name'];
		$password2 =  $_POST['Ass_ragistrar'];
		$query = "UPDATE rate_contract
		SET Ragistrar='$userName', Director= '$email', Agency_head = '$password', Agency_name='$password1', Ass_ragistrar='$password2'
		WHERE Academic_year=$fullname";
		$data = mysql_query ($query) or die(mysql_error());
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
			 window.alert("Incomplete Updation");
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
		$number = $_POST['complaint_no'];
		$fullname = $_POST['complaint'];
		$userName = $_POST['Student_name'];
		$email = $_POST['Status'];
		$query = "UPDATE complaint
		SET complaint='$fullname', Student_name = '$userName', Status = '$email'
		WHERE complaint_no=$number";
		$data = mysql_query ($query) or die(mysql_error());
		echo $data;
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
			 window.alert("Incomplete Updation");
			 </script>
			 <?php
			 
		}
	}
	Formcheck();
}

header("Location:index.php?name=$table_number & table=$table_name & username=$username");exit;
?>