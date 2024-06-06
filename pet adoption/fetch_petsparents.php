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
        echo "<button onclick='promptUserName(\"" . $row['petName'] . "\", \"" . $row['petAge'] . "\", \"" . $row['species'] . "\", \"" . $row['petCondition'] . "\", \"" . $row['dateOfArrival'] . "\", \"" . $row['breed'] . "\", \"" . $row['areaFound'] . "\")'>Adopt now</button>"; // Modified button
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();

// JavaScript function to prompt user for name and initiate adoption request
echo "<script>
function promptUserName(petName, petAge, species, petCondition, dateOfArrival, breed, areaFound) {
    var userName = prompt('Please enter your name:');
    if (userName != null && userName != '') {
        adoptPet(userName, petName, petAge, species, petCondition, dateOfArrival, breed, areaFound);
    }
}

function adoptPet(userName, petName, petAge, species, petCondition, dateOfArrival, breed, areaFound) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_request.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log('Request sent successfully');
            // You can perform further actions here if needed
        }
    };
    xhr.send('userName=' + encodeURIComponent(userName) + '&petName=' + encodeURIComponent(petName) + '&petAge=' + encodeURIComponent(petAge) + '&species=' + encodeURIComponent(species) + '&petCondition=' + encodeURIComponent(petCondition) + '&dateOfArrival=' + encodeURIComponent(dateOfArrival) + '&breed=' + encodeURIComponent(breed) + '&areaFound=' + encodeURIComponent(areaFound));
}
</script>";
?>
