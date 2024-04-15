<?php
// Check if running in a web server environment
if (isset($_SERVER["REQUEST_METHOD"])) {
    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Your existing code for handling form submission
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
        $age = isset($_POST['age']) ? intval($_POST['age']) : null; // Convert to integer or set to null if empty
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        // Validate age
        if ($age === null) {
            echo "Age is required.";
        } elseif ($age <= 0) {
            echo "Age must be a positive integer.";
        } else {
            // SQL query to insert data into the database using prepared statements
            $sql = "INSERT INTO pet_parents (name, age, gender, email, password, address) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("sissss", $name, $age, $gender, $email, $password, $address);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to the sign-in page after successful sign-up
                header("Location: sign_in_pet_parent.html");
                exit(); // Make sure to exit after redirecting
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    } else {
        // If the request method is not POST, display an error message
        echo "Invalid request method.";
    }
} else {
    // If not running in a web server environment, display an error message
    echo "Script must be accessed through a web server.";
}
?>
