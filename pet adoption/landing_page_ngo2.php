<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .mission {
            background-color: #FFDB58;
            padding: 20px;
            text-align: center;
            color: #333;
            font-style: italic;
        }

        .mission h2 {
            font-weight: bold;
        }

        .logo {
            text-align: center;
            margin-top: 20px;
        }

        .logo img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

        .meet-animals {
            text-align: center;
            margin-top: 10px;
            color: orange;
        }

        .pets-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .pet-card {
            width: 250px;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pet-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .pet-card .pet-details {
            display: none;
            padding: 15px;
            background-color: #fff;
        }

        .pet-card .pet-details p {
            margin: 5px 0;
        }

        .pet-card button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /* Carousel Styles */
        .carousel-container {
            text-align: center;
            margin: 20px 0;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            width: 80%;
            margin: auto;
            justify-content: center;
            align-items: center;
        }

        .carousel img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin: 0 10px;
        }

        /* New Section Styles */
        .information {
            background-color: #f4f4f4;
            color: #000;
        }
    </style>
</head>

<body>

    <header>
        <a href="http://127.0.0.1:5500/index.html">Home </a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="http://127.0.0.1:5500/sign_in_ngo.html" style="float: right;">Logout</a>
        <a href="http://127.0.0.1:5500/add_new_pet.html" style="float: right;"> <i class="fas fa-plus"></i></a>
        <a href="http://localhost:3000/history.php" style="float: right;"> <i class="fas fa-bell"></i></a>
    </header>

    <img src="https://purinaexpress.com/donations1.gif" alt="Cute Puppy" style="width: 30%; display: block; margin: 20px auto;">

    <div class="mission" id="about">
        <h2>OUR MISSION</h2>
        <p>We are committed to finding loving homes for every pet in need. Our goal is to create lasting bonds between pets and their new families, ensuring that every adoption is a perfect match. Through dedication and care, we strive to make a difference, one adoption at a time.</p>
        <blockquote>
            "The greatness of a nation and its moral progress can be judged by the way its animals are treated." <br>
            <span style="display:block; margin-top:10px;"><strong>- Mahatma Gandhi</strong></span>
        </blockquote>
    </div>

    <!-- Logo Section -->
    <div class="logo">
        <img src="https://i.pinimg.com/564x/a9/dd/1a/a9dd1a40ae780a3d6407c5ae3b2950b4.jpg" alt="Company Logo">
    </div>
    <div class="meet-animals">
        <h3>Meet the animals</h3>
    </div>

    <div class="pets-container">
        <!-- PHP to fetch pet details -->
        <!-- PHP to fetch pet details -->
        <?php require_once 'fetch_pets.php'; ?>
    </div>

    <div class="information" id="contact">
        <h2>Contact Us</h2>
        <p>Phone: 123-456-7890</p>
        <p>Email: info@pawsconnect.com</p>
    </div>

    <script>
        function toggleDetails(button) {
            const details = button.previousElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>
