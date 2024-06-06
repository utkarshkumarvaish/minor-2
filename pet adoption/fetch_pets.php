<?php
$servername = "localhost";
$username = "root";
$password = "vaishali@sf1";
$dbname = "pawsconnect";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='pet-card'>";
        
        // Construct the image filename using the pet's name
        $imageName = $row['petName'] . ".jpg";
        
        // Display the image with the pet's name as the filename
        echo "<img src='" . $imageName . "' alt='" . $row['petName'] . "'>";
        
        echo "<h3>" . $row['petName'] . "</h3>";
        echo "<p>Age: " . $row['petAge'] . " years</p>";
        echo "<p>Species: " . $row['species'] . "</p>";
        echo "<div class='pet-details'>";
        echo "<p>Condition: " . $row['petCondition'] . "</p>";
        echo "<p>Date of Arrival: " . $row['dateOfArrival'] . "</p>";
        echo "<p>Breed: " . $row['breed'] . "</p>";
        echo "<p>Area Found: " . $row['areaFound'] . "</p>";
        echo "</div>";
        echo "<button onclick='toggleDetails(this)'>Details</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
