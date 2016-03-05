<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sanitory_systems');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
function SignIn()
{
session_start();   //starting the session for user profile page
if(!empty($_POST['user']) && !empty($_POST['pass']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$user = mysql_real_escape_string($_POST['user']);
    $pass = mysql_real_escape_string($_POST['pass']);
	$query = mysql_query("SELECT *  FROM username where nameuser = '$user' AND pass = '$pass'	 ") or die(mysql_error());
    if (mysql_num_rows($query) == 1) 
	{
		$_SESSION['userName'] = $user;
		$_SESSION['login'] = "1";
        header("Location:login.php?username=$user");
	}
	else
	{
		//echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...<br>";
		//echo "<a href='index.html'>Click here to try again </a>";
		?>
		<script type="text/javascript">
		alert("SORRY, YOU ENTERD WRONG ID AND PASSWORD, PLEASE RETRY");
		window.location.href = "index.html";
		</script>
		<?php
	}
}
else
{
	//echo "SORRY... YOU DID NOT ENTER ID OR PASSWORD... PLEASE RETRY...";
	//echo "<a href='index.html'>Click here to try again </a>";
			?>
	<script type="text/javascript">
	alert("SORRY, YOU DID NOT ENTER ID OR PASSWORD ,PLEASE RETRY");
	window.location.href = "index.html";
	</script>
<?php
}
}
if(isset($_POST['submit']))
 {
 	SignIn();
}

?>