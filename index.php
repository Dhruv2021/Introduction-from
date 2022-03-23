<?php
   
   $insert=false;

    if(isset($_POST['name'])){
    
    $server = "localhost";

    $username = "root";

    $password = "";

    $con = mysqli_connect($server, $username, $password);
    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
   // echo "Success connecting to the db";



     $name = $_POST['name'];
     $sex = $_POST['sex'];
     $age = $_POST['age'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $desc = $_POST['desc'];
     
     $sql = "INSERT INTO `intro form`.`intro form` (`name`, `age`, `sex`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$sex', '$email', '$phone', '$desc', current_timestamp());";


     //echo $sql;

     if($con->query($sql) == true){
         //echo "Success Submitted!!!";
         $insert=true;
     }
     else{
         echo "ERROR: $sql <br> $con->error";
     }
$con->close();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Introduction Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Cinzel&display=swap" rel="stylesheet">
</head>
<body>
  
    <img class=bg src="bg2.jpg" alt="Background" >
    <div class="container">
        <h1>Introduction Form</h1>
        <p>Enter Your Details</p>
      
      <?php 
       
       if($insert == true){
            echo "<p class='submitMsg'> Your Form Has Been Successfully Submitted!!! </p> ";
        }

        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="sex" id="sex" placeholder="Enter Your Sex">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone number">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information (Optional)"></textarea>
            <button class="btn">SUBMIT</button>


        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>