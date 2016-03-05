<?php
	
	require '/../../includes/database/connect.db.php';
	$connection=mysqli_connect('localhost','root','') or die("cant connect");
	$database=mysqli_select_db($connection,'sanitory_systems') or die("cant connect database");
echo "<html>";
    echo "
    <head>
        <title>Attendnce</title>
    </head>
    <style>
    body{
        background-image:url(att_list.jpg);
        background-repeat:no-repeat;/*we want to have one single image not a repeated one*/   
        background-size:cover;/*this sets the image to fullscreen covering the whole screen*/
    }
    </style>
    </html>";
  $user = $_GET['username'];
	echo "<h1>The detailed attendance list for all the Workers: </h1>";
	echo " <form  method='GET' action = 'attendance.php?'> <input type='hidden' name='username' value='$user' /> <button style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; background-color: orange;
    float:right;    border-radius: 10px 10px 10px 10px'> Back to Attendance </button></form>";
	
  $sql = "SELECT * FROM attendance ORDER BY Year DESC,Month DESC ,Date DESC";
	$result = mysqli_query($connection,$sql);
    
	if (mysqli_num_rows($result) > 0) 
	{
            // output data of each row
            //echo " <button> Show detail </button> ";    
        	while($row = mysqli_fetch_array($result)) 
        	{
	       		echo "<table border='1'cell padding='100'width='80%'>";
				//echo " Record for ".$month[$row["Month"]-1]."&nbsp".$row["Year"];	
	       		echo "<tr> <th>Year</th> <th>Month</th> <th>Date</-th> <th>Worker_ID</th></tr>";
        		echo '<td>'. $row["Year"] . '</td>';
      			echo '<td>'. $row["Month"]. '</td>';
      			echo '<td>'. $row["Date"] . '</td>';
      			echo '<td>'. $row["Worker_ID"] . '</td>';
      			echo "</tr>";
        		//echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
        	}
    	}	 
    	else {
        	echo "0 results";
    	}
    	$connection->close();	

?>