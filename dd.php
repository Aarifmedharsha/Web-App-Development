<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
// Servername
$servername = "localhost";

// Username
$username = "root";

// Empty password
$password = "";

// Database name
$dbname = "cv_data";

// Create connection by passing these
// connection parameters
$conn = new mysqli($servername,
$username, $password, $dbname);

// SQL query to find total count
// of college_data table
$sql = "SELECT * FROM cvp ORDER BY dt DESC LIMIT 1";
$result = $conn->query($sql);
?>
<?php
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    echo "<br>";
      ?>  
	<div class="main">
		<div class="top-section">
			<p class="p1"><?php echo $row["name"];?></p>
			<p class="p2"><?php echo $row["job"];?></p>
		</div>
		<div class="clearfix"></div>

		<div class="col-div-4">
			<div class="content-box" style="padding-left: 40px;">

				
			<p class="head">Contact</p>
			<p class="p3"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $row["phone"]; ?></p>
			<p class="p3"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $row["email"]; ?></p>
			<p class="p3"><i class="fa fa-home" aria-hidden="true"></i><?php echo $row["state"]; ?></p>
			

			<br/>
			<p class="head">My skills</p>
			<ul class="skills">
				<li><span><?php echo $row["skill_1"]; ?></span></li>
				<li><span><?php echo $row["skill_2"]; ?></span></li>
				<li><span><?php echo $row["skill_3"]; ?></span></li>

			</ul>
			<br/>
			</div>
		</div>
		<div class="line"></div>
		<div class="col-div-8">
			<div class="content-box">
			<p class="head">About Myself</p>
			<p class="p3" style="font-size: 14px;"><?php echo $row["abt"]; ?></p>
			<br/>
			<p class="head">EXPERIENCE</p>

			<p><?php echo $row["experience_1"]; ?></p>
			<p><?php echo $row["experience_2"]; ?></p>

			<br/>

			<p class="head">Education</p>
			<p class="p-4" ><?php echo $row["qualification_1"]; ?></p>
			<p class="p-4" ><?php echo $row["qualification_2"]; ?></p>
			<p class="p-4" ><?php echo $row["qualification_3"]; ?></p>


			</div>
		</div>

	<?php 
    }
    ?>
<br/>
		<?php
$conn->close();

?>

</body>
</html>