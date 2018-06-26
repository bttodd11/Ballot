<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Results</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
  </head>
  <body>
    <h3>Petition Signees</h3>


  </body>
</html>
<?php
if(isset( $_POST['FName']) && !empty($_POST['FName'] ))
{
  $data = $_POST['FName'] ;
}
if(isset( $_POST['LName']) && !empty($_POST['LName'] ))
{
  $data1 = $_POST['LName'] ;
}
if(isset( $_POST['City']) && !empty($_POST['City'] ))
{
  $data2 = $_POST['City'] ;
}
if(isset( $_POST['State']) && !empty($_POST['State'] ))
{
  $data3 = $_POST['State'] ;
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
 $insert = "INSERT INTO ballot (`FName`,`LName`,`City`,`State`) VALUES ('$data','$data1','$data2', '$data3')";

 if (mysqli_query($mysqli, $insert) && !empty($fname && $lname && $city && $state)) {
     echo "New record created successfully" . '<br>';
 } else {
     echo "Error <br>" . mysqli_error($mysqli);
 }

#Created Variables from my Get Request
$fname = $_POST['FName'];
$lname = $_POST['LName'];
$city = $_POST['City'] ;
$state = $_POST['State'];

#Checks to see if the field is empty, if it is the it returns Please enter all Values
if(!empty($fname && $lname && $city && $state) )
{
echo 'Thank you for signing the petition  </div>' . '<br>'.'<br>';

}
else {
  echo 'Please enter all values';
}

# Selecting from the MySQL Database
$sql = "SELECT ID, FName, LName, City, State FROM ballot";

#Bring the data back from the MySQL $database

$result = mysqli_query($mysqli, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '' . $row['ID'] . '<br>' . "First Name:". $row["FName"] .'<br>'. "Last Name: " . $row["LName"]. '<br>' . "City: " . $row["City"] . '<br>' . "State: " . $row["State"] .'<br>' .'<br>';
    }
} else {
    echo "0 results";
}
$mysqli->close();


 ?>
