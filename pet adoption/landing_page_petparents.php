<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption System</title>
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
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .meet-animals {
            text-align: center;
            margin-top: 10px;
            color: orange;
        }

        .puppies-waiting {
            text-align: center;
            margin-top: 10px;
            font-family: 'Cooper Black', sans-serif;
            font-weight: bold;
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
        .add-pet-section {
            background-color: #5C85D6;
            padding: 20px;
            text-align: center;
        }

        .add-pet-section button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .information{
            background-color: #f4f4f4;
            color: #000;
        }

    </style>
</head>

<body>

    <header>
        <a href="http://127.0.0.1:5500/index.html">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="http://127.0.0.1:5500/sign_in_pet_parent.html" style="float: right;">Logout</a>
    </header>

    <img src="https://cdn.dribbble.com/users/97870/screenshots/1916644/pup.gif" alt="Cute Puppy" style="width: 100%; display: block; margin: 20px auto;">

    <div class="mission" id="about">
        <h2>OUR MISSION</h2>
        <p>We want to help you give your pet the very best quality of life. In our opinion, the best way of doing this is to see the world as your pet sees it. We take this approach for everything from food and snacks to toys, bedding, and other accessories. Every item we carry is something we would give to our own pets, with love and care.</p>
    </div>

    <!-- Logo Section -->
    <div class="logo">
    <img src="https://i.pinimg.com/564x/a9/dd/1a/a9dd1a40ae780a3d6407c5ae3b2950b4.jpg" alt="Company Logo">
</div>
<div class="meet-animals">
    <h3>Meet the animals</h3>
</div>
<div class="puppies-waiting" style="font-size: 24px; font-style: italic;">
    <h3>🐾 Pets are waiting to meet you! 🐾</h3>
</div>   
<div class="pets-container">
    <!-- PHP to fetch pet details -->
    <!-- PHP to fetch pet details -->
    <?php require_once 'fetch_petsparents.php'; ?>
</div>

    <div class="carousel-container">
    
    <img src="https://mummycat.in/wp-content/uploads/2022/10/Untitled-1-1.jpg" alt="Happy Client" style="width: 100%; display: block; margin: 20px auto;">
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

        function showAddPetForm() {
            const form = document.getElementById('add-pet-form');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function addNewPet(event) {
            event.preventDefault();

            const petName = document.getElementById('petName').value;
            const petAge = document.getElementById('petAge').value;
            const petSpecies = document.getElementById('petSpecies').value;
            const condition = document.getElementById('condition').value;
            const dateOfArrival = document.getElementById('dateOfArrival').value;
            const breed = document.getElementById('breed').value;
            const areaFound = document.getElementById('areaFound').value;
            const petImage = document.getElementById('petImage').files[0];

            const reader = new FileReader();
            reader.onload = function (e) {
                const newPetCard = `
                <div class="pet-card">
                    <img src="${e.target.result}" alt="${petName}">
                    <h3>${petName}</h3>
                    <p>Age: ${petAge} years</p>
                    <p>Species: ${petSpecies}</p>
                    <div class="pet-details">
                        <p>Condition: ${condition}</p>
                        <p>Date of Arrival: ${dateOfArrival}</p>
                        <p>Breed: ${breed}</p>
                        <p>Area Found: ${areaFound}</p>
                    </div>
                    <button onclick="toggleDetails(this)">Details</button>
                </div>
                `;
                const petsContainer = document.querySelector('.pets-container');
                petsContainer.innerHTML += newPetCard;
            }
            reader.readAsDataURL(petImage);

            document.getElementById('petName').value = '';
            document.getElementById('petAge').value = '';
            document.getElementById('petSpecies').value = '';
            document.getElementById('condition').value = '';
            document.getElementById('dateOfArrival').value = '';
            document.getElementById('breed').value = '';
            document.getElementById('areaFound').value = '';
            document.getElementById('petImage').value = '';
            document.getElementById('add-pet-form').style.display = 'none';
        }
    </script>

</body>

</html>