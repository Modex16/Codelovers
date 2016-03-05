<?php
	require '/chat/includes/database/connect.db.php';
	$connection=mysqli_connect('localhost','root','') or die("cant connect");
	$database=mysqli_select_db($connection,'sanitory_systems') or die("cant connect database");
	$sql = "SELECT * FROM username";
	$result = mysqli_query($connection,$sql);
	
	//$result = 	$connection->query($sql);
	if (mysqli_num_rows($result) > 0) 
	{
    	// output data of each row
		echo "<h2>The database details for the registered users : <br><br>";
		echo "<table border='1' cell padding='100' width='100%' border-collapse='collapse' border-spacing ='50px'>";
		echo "<tr> <th>Seial No</th> <th>Name</th> <th>Email_ID</th></tr>";
    	while($row = mysqli_fetch_array($result)) 
    	{
    		echo '<td >' .$row["Serial_No"] . '</td>';
  			echo '<td>' . $row["Name"] .'</td>';
  			//echo '<td>' . $row["nameuser"] .'</td>';
  			echo '<td>' . $row["email_ID"] .'</td>';
  			echo "</tr>";
    		//echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
    	}
	}	 
	else {
    	echo "0 results";
	}

    	//echo "<h4>Insert new row : ";
	$connection->close();
?>	