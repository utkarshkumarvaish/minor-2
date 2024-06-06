<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://res.cloudinary.com/mycreativeshop/image/upload/f_auto,q_auto/v1706317371/public/po563y5y3w6sjosj1mrt');
            background-size: cover;
            background-position: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        header a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .request-card {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .request-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .request-card h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
        }

        .request-card p {
            margin: 5px 0;
            color: #555;
        }

        .request-actions {
            text-align: center;
            margin-top: 20px;
        }

        .accept-btn,
        .reject-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .accept-btn {
            background-color: #4CAF50;
            color: #fff;
        }

        .accept-btn:hover {
            background-color: #45a049;
        }

        .reject-btn {
            background-color: #f44336;
            color: #fff;
        }

        .reject-btn:hover {
            background-color: #db4436;
        }
    </style>
</head>

<body>

    <header>
        <a href="http://127.0.0.1:5500/landing_page_ngo2.html"><i class="fas fa-home"></i></a>
    </header>

    <div class="container">
        <div class="pet-parent-info">
            <h2>Adoption Requests</h2>
            <!-- PHP code to fetch requests from the database -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "vaishali@sf1";
            $dbname = "pawsconnect";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM requests";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='request-card'>";
                    echo "<h3><i class='fas fa-user icon'></i> " . $row['userName'] . "</h3>";
                    echo "<p><strong>Pet Name:</strong> " . $row['petName'] . "</p>";
                    echo "<p><strong>Pet Age:</strong> " . $row['petAge'] . "</p>";
                    echo "<p><strong>Species:</strong> " . $row['species'] . "</p>";
                    echo "<p><strong>Condition:</strong> " . $row['petCondition'] . "</p>";
                    echo "<p><strong>Date of Arrival:</strong> " . $row['dateOfArrival'] . "</p>";
                    echo "<p><strong>Breed:</strong> " . $row['breed'] . "</p>";
                    echo "<p><strong>Area Found:</strong> " . $row['areaFound'] . "</p>";
                    echo "<div class='request-actions'>";
                    echo "<button class='accept-btn' onclick='acceptRequest(\"" . $row['petName'] . "\", \"" . $row['id'] . "\")'>Accept</button>";
                    echo "<button class='reject-btn' onclick='rejectRequest(\"" . $row['petName'] . "\", \"" . $row['id'] . "\")'>Reject</button>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function acceptRequest(petName, requestId) {
            // Send request to server to accept the adoption request with given requestId
            // Example: You can use AJAX to send a request to your server-side script to update the request status
            alert(`Request for adopting ${petName} has been accepted.`);
        }

        function rejectRequest(petName, requestId) {
            // Send request to server to reject the adoption request with given requestId
            // Example: You can use AJAX to send a request to your server-side script to update the request status
            alert(`Request for adopting ${petName} has been rejected.`);
        }
    </script>

</body>

</html>
