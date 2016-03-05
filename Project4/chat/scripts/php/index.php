
<?php

    session_start();

    if (!(isset($_SESSION['login']) and $_SESSION['login']!='')) //to check if session is created when the user os logged in
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
	require '/../../includes/database/connect.db.php';
	$connection=mysqli_connect('localhost','root','') or die("cant connect");//connecto the database
	$database=mysqli_select_db($connection,'sanitory_systems') or die("cant connect database");
    
    $table_number = $_GET["name"]; $table_name = $_GET["table"]; $user = $_GET['username'];
    echo "$user";
    echo "<a href='../../../TEST1.php?username=$user'>";
    echo "<button style='float:right; font-family:courier; border-radius:20px; width:100px; height:40px; background:#ADD8E6; font-weight:bold; font-size:18px;' > Home </button>";
    echo "</a>";
    echo "<table border='1'cell padding='100'width='100%'>";
    
    echo " <center><h1 style='text-decoration:underline' >Welcome to the $table_name section </h1> </center>";
    // select table from parameter passed from TEST1.html
	if($table_number==11)
    {
       $sql = "SELECT * FROM workers";
	   $result = mysqli_query($connection,$sql);
	   if (mysqli_num_rows($result) > 0) 
	   {
            // output data of each row
	       echo "<tr> <th>WorkerID</th> <th>Name</th> <th>Rating</th> <th>Salary</th></tr>";

        	while($row = mysqli_fetch_array($result)) 
        	{
        		echo '<td>'. $row["workerID"] . '</td>';
      			echo '<td>'. $row["name"]. '</td>';
      			echo '<td>'. $row["rating"] . '</td>';
      			echo '<td>'. $row["salary"] . '</td>';
      			echo "</tr>";
        		//echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
        	}
    	}	 
    	else {
        	echo "0 results";
    	}
        if($user == "admin"){
        echo "<h3>1. Insertion: ";
        echo "<form method='POST'action='insertion.php?table_num=11 & table_name=$table_name & username=$user'>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='workerId'>
        				WorkerID<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
        				Name<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Rating'>
        				Rating<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Salary'>
        				Salary<br><br>
        				<input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
        						
        	  </form>";
        echo "<h3>2. Deletion";
        echo "<form method='POST'action='deletion.php?table_num=11 & table_name=$table_name & username=$user'>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='WorkerID'>
        				WorkerID<br><br>
        				<input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>	
        				 </form>";
        echo "<h3>3. Updation";
        echo "<form method='POST'action='updation.php?table_num=11 & table_name=$table_name & username=$user'>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='workerId'>
        				WorkerID<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
        				Name<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Rating'>
        				Rating<br><br>
        				<input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Salary'>
        				Salary<br><br>
        				<input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
        						
        				 </form>";
        }
    }
    else if($table_number==22)
    {
        $sql = "SELECT * FROM supervisor";
        $result = mysqli_query($connection,$sql);
    
        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            echo "<tr> <th>SupervisorID</th> <th>Name</th> <th>Rating</th> <th>Salary</th></tr>";

            while($row = mysqli_fetch_array($result)) 
            {
                echo '<td>'. $row["supervisorID"] . '</td>';
                echo '<td>'. $row["name"]. '</td>';
                echo '<td>'. $row["rating"] . '</td>';
                echo '<td>'. $row["salary"] . '</td>';
                echo "</tr>";
                //echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
            }
        }    
        else {
            echo "0 results";
        }
        if($user == "admin"){
        echo "<h3>1. Insertion: ";
        echo "<form method='POST'action='insertion.php?table_num=22 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='supervisorId'>
                        SupervisorID<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
                        Name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Rating'>
                        Rating<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Salary'>
                        Salary<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
              </form>";
        echo "<h3>2. Deletion";
        echo "<form method='POST'action='deletion.php?table_num=22 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='supervisorID'>
                        supervisorID<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>   
                         </form>";
        echo "<h3>3. Updation";
        echo "<form method='POST'action='updation.php?table_num=22 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='supervisorId'>
                        SupervisorID<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
                        Name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Rating'>
                        Rating<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Salary'>
                        Salary<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
                         </form>";
        }
    }
    else if($table_number==33)
    {

        $sql = "SELECT * FROM hostel";
        $result = mysqli_query($connection,$sql);
    
        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            echo "<tr> <th>Name</th> <th>No. of Workers</th> <th>Warden</th> <th> Admin_warden</th></tr>";

            while($row = mysqli_fetch_array($result)) 
            {
                echo '<td>'. $row["Name"] . '</td>';
                echo '<td>'. $row["No_of_workers"]. '</td>';
                echo '<td>'. $row["Warden"] . '</td>';
                echo '<td>'. $row["admin_warden"] . '</td>';
                echo "</tr>";
                //echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
            }
        }    
        else {
            echo "0 results";
        }
        if($user == "admin"){
        echo "<h3>1. Insertion: ";
        echo "<form method='POST'action='insertion.php?table_num=33 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
                        Hostel_Name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Number_of_workers'>
                        Number_of_workers <br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Warden'>
                        Warden<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Admin_warden'>
                        Admin_warden<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
              </form>";
        echo "<h3>2. Deletion";
        echo "<form method='POST'action='deletion.php?table_num=33 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
                        Hostel_Name<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>   
                         </form>";
        echo "<h3>3. Updation";
        echo "<form method='POST'action='updation.php?table_num=33 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Name'>
                        Hostel_Name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Number_of_workers'>
                        Number_of_workers <br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Warden'>
                        Warden<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Admin_warden'>
                        Admin_warden<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
                         </form>";
        }
    }
    else if($table_number==44)
    {

        $sql = "SELECT * FROM rate_contract";
        $result = mysqli_query($connection,$sql);
    
        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            echo "<tr> <th>Academic_year</th> <th>Ragistrar</th> <th>Director</th> <th> Agency_head</th> <th> Agency_name</th> <th> Ass_ragistrar</th></tr>";

            while($row = mysqli_fetch_array($result)) 
            {
                echo '<td>'. $row["Academic_year"] . '</td>';
                echo '<td>'. $row["Ragistrar"]. '</td>';
                echo '<td>'. $row["Director"] . '</td>';
                echo '<td>'. $row["Agency_head"] . '</td>';
                echo '<td>'. $row["Agency_name"] . '</td>';
                echo '<td>'. $row["Ass_ragistrar"] . '</td>';
                echo "</tr>";
                //echo "WorkerID: " . $row["workerID"]."&nbsp - Name: " . $row["name"]. "&nbsp Rating " . $row["rating"]." &nbsp Salary :" . $row["salary"]."<br>";
            }
        }    
        else {
            echo "0 results";
        }
        if($user == "admin"){
        echo "<h3>1. Insertion: ";
        echo "<form method='POST'action='insertion.php?table_num=44 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Academic_year'>
                        Academic_year<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Ragistrar'>
                        Ragistrar <br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Director'>
                        Director<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Agency_head'>
                        Agency_head<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Agency_name'>
                        Agency_name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Ass_ragistrar'>
                        Ass_ragistrar<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
              </form>";
        echo "<h3>2. Deletion";
        echo "<form method='POST'action='deletion.php?table_num=44 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Academic_year'>
                        Academic_year<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>   
                         </form>";
        echo "<h3>3. Updation";
        echo "<form method='POST'action='updation.php?table_num=44 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='Academic_year'>
                        Academic_year<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Ragistrar'>
                        Ragistrar <br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Director'>
                        Director<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Agency_head'>
                        Agency_head<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Agency_name'>
                        Agency_name<br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Ass_ragistrar'>
                        Ass_ragistrar<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>        
                         </form>";
        }
    }
    else if($table_number==55)
    {

        $sql = "SELECT * FROM complaint";
        $result = mysqli_query($connection,$sql);
        
        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            echo "<tr> <th>Complaint_number</th> <th>Complaint</th> <th>Student_name</th> <th> Status</th> </tr>";

            while($row = mysqli_fetch_array($result)) 
            {
                echo '<td>'. $row["complaint_no"] . '</td>';
                echo '<td>'. $row["complaint"]. '</td>';
                echo '<td>'. $row["Student_name"] . '</td>';
                echo '<td>'. $row["Status"] . '</td>';
                echo "</tr>";            
            }
        }    
        else {
            echo "0 results";
        }
        if($user!="admin"){
        echo "<h3>Submit your Complaint: ";
        echo "<form method='POST'action='insertion.php?table_num=55 & table_name=$table_name & username=$user'>
                        <textarea rows='8' cols='50' name='complaint'></textarea>
                        Your Complaint<br>
                        <input type='text'name='Student_name'>
                        Your Name <br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                                
              </form>";
          }
        if($user == "admin"){
            echo "<h3> Process the complaint : </h3>";
        echo "<h3>2. Deletion";
        echo "<form method='POST'action='deletion.php?table_num=55 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='complaint_no'>
                        Complaint_number<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>   
                         </form>";
        echo "<h3>3. Updation";
        echo "<form method='POST'action='updation.php?table_num=55 & table_name=$table_name & username=$user'>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='number'name='complaint_no'>
                        Complaint_number<br><br>
                        <textarea rows='5' cols='30'  name='complaint'></textarea>
                        Complaint<br><br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Student_name'>
                        Student_name <br><br>
                        <input style='height:40px; margin-top:0px; width: 15%; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px' type='text'name='Status'>
                        Status<br><br>
                        <input style='height:40px; margin-top:0px; width: 10%; font-size: 15px; text-align: center; background-color:lightblue; border-radius: 10px 10px 10px 10px' type='submit'>
                         </form>";
        }

    }
    else{
        echo "Oops it seems that you have not used your login credenetials !!!! <br> Please login first .";
    }
echo "<h2> Database Record :  </h2>";
	$connection->close();
                        
?>	