<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'sanitory_systems');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser()
{
	$fullname = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$password1 = $_POST['cpass'];
	$query = "INSERT INTO username (Name,nameuser,email_ID,pass) VALUES ('$fullname','$userName','$email','$password')";
	if($password==$password1)
	{	
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	//echo "YOUR REGISTRATION IS COMPLETED<br>";
	//echo "<a href='index.html'>Click here to login </a>";
		?>
<script type="text/javascript">
alert("YOUR REGISTRATION IS COMPLETED");
window.location.href = "index.html";
</script>
<?php
    }
    }
    else
     {
     	//echo "SORRY...PASSWORDS DO NOT MATCH<br>";
     	//echo "<a href='sign-up.html'>Click here to try again </a>";
     	?>
        <script type="text/javascript">
        alert("SORRY...PASSWORDS DO NOT MATCH");
        window.location.href = "sign-up.html";
        </script>
        <?php
     } 
}

function SignUp()
{
if(!empty($_POST['user']) and !empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['pass']) )   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM userName WHERE nameuser = '$_POST[user]'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		//echo "YOU ARE ALREADY REGISTERED USER<br>";
		//echo "<a href='index.html'>Click here to login </a>";
        	?>
<script type="text/javascript">
alert("YOU ARE ALREADY REGISTERED USER");
window.location.href = "index.html";
</script>
<?php

	}
}
else
{
	//echo "INCOMPLETE REGISTRAION<br>";
	//echo "<a href='sign-up.html'>Click here to try again </a>";
	     	?>
<script type="text/javascript">
window.alert("INCOMPLETE REGISTRAION");
window.location.href = "sign-up.html";
</script>
<?php
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>