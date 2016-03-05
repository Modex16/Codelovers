<?php

    session_start();

    if (!(isset($_SESSION['login']) and $_SESSION['login']!='')) 
    {

        header ("Location: ../../../index.html");

    }

?>

<?php
    echo "<html>";
    echo "
    <head>
        <title>Attendnce</title>
    </head>
    <style>
    body{
        background-image:url(att.jpg);
        background-repeat:no-repeat;/*we want to have one single image not a repeated one*/   
        background-size:cover;/*this sets the image to fullscreen covering the whole screen*/
    }
    </style>
    </html>";
	echo "<h1 style='text-align:center;text-decoration:underline'> Attendnce Record </h1>";
	require '/../../includes/database/connect.db.php';
	$connection=mysqli_connect('localhost','root','') or die("cant connect");
	$database=mysqli_select_db($connection,'sanitory_systems') or die("cant connect database");
    $user = $_GET['username'];

    if($user=="admin")
    {
            echo "<a href='../../../TEST1.php?username=$user'>";
    echo "<button style='float:right; font-family:courier; border-radius:20px; width:100px; height:40px; background:#ADD8E6; font-weight:bold; font-size:18px;' > Home </button>";
    echo "</a>";

        echo "<h3> Update the attendance table with todays record: </h3>";
        echo "<form method='POST'action='update_attendance.php?username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Year'>
                        Year<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px'  type='number'name='Month'>
                        Month<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Date'>
                        Date<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Worker_ID'>
                        Worker_ID<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 20px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
              </form>";
        echo " <h2>The attendance Record : </h2>";
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

    }
    else{
    echo "<a href='../../../TEST1.php?username=$user'>";
    echo "<button style='float:left; font-family:courier; border-radius:20px; width:100px; height:40px; background:#ADD8E6; font-weight:bold; font-size:18px;' > Home </button>";
    echo "</a>";
    echo "<h4 style='text-align:right'>Click here to get the Detailed list</h4>";
    echo " <form  method='GET' action = 'attendance_list.php?'> <input type='hidden' name='username' value='$user' /> <button style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; background-color: orange;
    float:right;    border-radius: 10px 10px 10px 10px'> Attendance_list </button></form>";
    
    $sql = "SELECT  Worker_ID,COUNT(Worker_ID),Month,Year FROM attendance GROUP BY Year,Month,Worker_ID ORDER BY Year DESC,Month DESC";
    $result = mysqli_query($connection,$sql);
    $month = array('January','February','March','April','May','June','July','August','September','October','November','December');
    echo "<br>";
    if (mysqli_num_rows($result) > 0) 
    {
            // output data of each row
            $monthset = -1;
            while($row = mysqli_fetch_array($result)) 
            {
                echo "<table border='1'cell padding='100'width='40%'>";
                if($monthset==-1)
                {
                //    echo "<table border='1'cell padding='100'width='20%'>";
                    echo " <br>Record for ".$month[$row["Month"]-1]."&nbsp".$row["Year"];
                    echo "<tr> <th>Worker_ID</th> <th>Absents</th></tr>";
                //    echo '<td>'. $row["Worker_ID"] . '</td>';
                //    echo '<td>'.$row["COUNT(Worker_ID)"].'</td>';
                //    echo "</tr>";
                    $monthset = $row["Month"];
                }
                else{
                if($monthset!=$row["Month"]){
                    echo " <br>Record for ".$month[$row["Month"]-1]."&nbsp".$row["Year"];   
                    echo "<tr> <th>Worker_ID</th> <th>Absents</th></tr>";
                    $monthset = $row["Month"];
                }

                //echo "<table border='1'cell padding='100'width='20%'>";
                

                }

                echo '<td>'. $row["Worker_ID"] . '</td>';
                echo '<td>'.$row["COUNT(Worker_ID)"].'</td>';
                echo "</tr>";
                //echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
            }
        }    
        else {
            echo "0 results";
        }
    }
    $connection->close();
?>