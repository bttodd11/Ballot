<?php

if(isset( $_POST['FName']) && !empty($_POST['FName'] ))
{
  $data = $_POST['FName'] ;
  
}
else{
  header('location:index.php');
  exit();
}
#Created Variables from my Get Request
$fname = $_POST['FName'];
$lname = $_POST['LName'];
$city = $_POST['City'];
$state = $_POST['State'];

#MySQL Connection
$username = "root";
$password = "password";
$hostname = "localhost";
$database = "ballot";

$mysqli = mysqli_connect( $hostname, $username, $password, $database);
// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

#Insert data into table "Ballot"
 $insert = "INSERT INTO b_names (`FName`) VALUES ('$data')";

 if (mysqli_query($mysqli, $insert) && !empty($fname && $lname && $city && $state)) {
     echo "New record created successfully" . '<br>';
 } else {
     echo "Error <br>" . mysqli_error($mysqli);
 }

#Created Variables from my Get Request
$fname = $_POST['FName'];
$lname = $_POST['LName'];
$city = $_POST['City'];
$state = $_POST['State'];

#Checks to see if the field is empty, if it is the it returns Please enter all Values
if(!empty($fname && $lname && $city && $state) )
{
echo 'First Name: ' . $_POST['FName'] . '<br>';
echo 'Last Name:  ' . $_POST['LName'] . '<br>';
echo 'City:  ' . $_POST['City'] . '<br>';
echo 'State:  ' . $_POST['State'] . '<br>';
}
else {
  echo 'Please enter all values';
}
$mysqli->close();


 ?>
