<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname="cv_data";  
    // Create a database connection
    $con= mysqli_connect($server, $username, $password,$dbname);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];    
    $job = $_POST['job'];    
    $state = $_POST['state'];
    $abt = $_POST['abt'];
    $skill_1 = $_POST['skill_1'];
    $skill_2 = $_POST['skill_2'];
    $skill_3 = $_POST['skill_3'];
    $experience_1 = $_POST['experience_1'];
    $experience_2 = $_POST['experience_2'];
    $qualification_1 = $_POST['qualification_1'];
    $qualification_2 = $_POST['qualification_2'];
    $qualification_3 = $_POST['qualification_3'];
    $sql = "INSERT INTO cvp VALUES ('$name', '$email', '$phone','$job','$state','$abt','$skill_1','$skill_2','$skill_3','$experience_1','$experience_2','$qualification_1','$qualification_2','$qualification_3', current_timestamp());";
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>   
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
.container{
    max-width: 80%;
    background-color: rgba(55, 85, 87, 0.781);
    padding: 14px;
    margin: auto;
}
.container p{
    text-align: center;
}
input, textarea{
    display: block;
    width: 80%;
    margin: 11px auto;
    padding: 7px;
    font-size: 15px;
    border: 2px;
    border-radius: 6px;
    outline: none;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.btn{
    color: rgb(81, 211, 216);
    background: rgb(254, 254, 255);
    padding: 10px 10px;
    font-size: 15px;
    border-radius: 14px;
    border: 2px solid white;
    cursor: pointer;
}
.bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.7;
}
.msg{
    color: azure;
    font-size: 20px ;
}
</style>
</head>
<body>

</div>
    <div class="container">
        <!-- <h2 style="text-align:center;">Welcome to Aarif's CV maker</h2> -->
        <?php echo "<h1>Welcome " . $_SESSION['username'] . "!! </br><h2>Please enter your details for the CV</h2></h1>"; ?>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us.</p>";
        }
    ?>
        <form action="welcome.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="email" name="email" id="email" placeholder="Enter your Email ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No">
            <input type="job" name="job" id="job" placeholder="Enter your Designation">
            <input type="state" name="state" id="state" placeholder="Enter your Country">
            <textarea name="abt" id="abt" cols="30" rows="5" placeholder="Enter about yourself"></textarea>
            <input type="skill_1" name="skill_1" id="skill_1" placeholder="Enter your Skill-1">
            <input type="skill_2" name="skill_2" id="skill_2" placeholder="Enter your Skill-2">
            <input type="skill_3" name="skill_3" id="skill_3" placeholder="Enter your Skill-3">
            <input type="experience_1" name="experience_1" id="experience_1" placeholder="Enter your Experince-1">
            <input type="experience_2" name="experience_2" id="experience_2" placeholder="Enter your Experince-2">
            <input type="qualification_1" name="qualification_1" id="qualification_1" placeholder="Enter your Qualification-1">
            <input type="qualification_2" name="qualification_2" id="qualification_2" placeholder="Enter your Qualification-2">
            <input type="qualification_3" name="qualification_3" id="qualification_3" placeholder="Enter your Qualification-3">
            <button class="btn">Submit</button> 
            <?php
        if($insert == true){
        echo "<button class='btn'><a href='dd.php'>Open CV</a></button>";
        }
    ?>
        </form>
    </div>
<div class="input-group">
	<h2><button name="submit" class="btn"><a href="logout.php">Logout</a></button></h2>
</div>
    
</body>
</html>