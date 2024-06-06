<?php
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

// Check if the requests table exists
$tableExistsQuery = "SHOW TABLES LIKE 'requests'";
$tableExistsResult = $conn->query($tableExistsQuery);

if ($tableExistsResult->num_rows == 0) {
    // Table does not exist, create it
    $createTableQuery = "CREATE TABLE requests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userName VARCHAR(50) NOT NULL,
        petName VARCHAR(50) NOT NULL,
        petAge VARCHAR(10) NOT NULL,
        species VARCHAR(50) NOT NULL,
        petCondition VARCHAR(255) NOT NULL,
        dateOfArrival DATE NOT NULL,
        breed VARCHAR(50) NOT NULL,
        areaFound VARCHAR(255) NOT NULL,
        requestTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableQuery) === TRUE) {
        echo "Table 'requests' created successfully. ";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Prepare SQL statement to insert the request into the database
$stmt = $conn->prepare("INSERT INTO requests (userName, petName, petAge, species, petCondition, dateOfArrival, breed, areaFound) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssssss", $userName, $petName, $petAge, $species, $petCondition, $dateOfArrival, $breed, $areaFound);

// Set parameters
$userName = $_POST['userName']; // Assuming the form contains a field for the user's name
$petName = $_POST['petName'];
$petAge = $_POST['petAge'];
$species = $_POST['species'];
$petCondition = $_POST['petCondition'];
$dateOfArrival = $_POST['dateOfArrival'];
$breed = $_POST['breed'];
$areaFound = $_POST['areaFound'];

// Execute the statement
if ($stmt->execute()) {
    echo "Request saved successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
