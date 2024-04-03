<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "vaishali@sf1";
$dbname = "pawsconnect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the form
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];

// SQL query to insert data into the database
$sql = "INSERT INTO pet_parents (name, age, gender, email, password, address) VALUES ('$name', '$age', '$gender', '$email', '$password', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
