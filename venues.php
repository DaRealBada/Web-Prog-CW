<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Devotion - Venue Search</title>
    <link rel="stylesheet" href ="venues.css">
    
    <style>
        /* Venue Details Section */
        #venue-details {
            margin-top: 40px; /* Add some space between sections */
        }

        #venue-details h3 {
            color: #333; /* Darker heading color */
            margin-bottom: 10px; /* Add some space below the heading */
        }

        #venue-details table {
            width: 100%;
            border-collapse: collapse;
        }

        #venue-details table th,
        #venue-details table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        #venue-details table th {
            background-color: #f2f2f2; /* Light gray background for table header */
        }

        #venue-details table tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternate row background color */
        }

        #venue-details table tr:hover {
            background-color: #f2f2f2; /* Hover background color */
        }

        #venue-details p {
            margin-bottom: 5px; /* Adjust margin below paragraphs */
        }

        #venue-details .no-details {
            font-style: italic;
            color: #999;
        }


        .header {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 300px; /* Adjust height as needed */
            background-image: url("weddheader.jpg");
            background-size: cover; /* Ensure image covers the entire header */
            background-position: center; /* Center the background image */
        }

        .h1 {
            font-size: 36px; /* Adjust font size as needed */
            color: beige;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add shadow for better readability */
            font-family: 'Brush Script MT', cursive;
        }
        body{
            font-family: 'Brush Script MT', cursive;
            font-size: 30px;
        }
        /* Sidebar */
        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
          text-align:center;
        }
        
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }
        
        .sidenav a:hover{
          color: #f1f1f1;
          font-family: "Sansation Light";
        }
        
        .sidenav .closebtn {
          position: absolute;
          top: 0;
          left: 0;
          font-size: 36px;
          margin-left: 50px;
        }
        
        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        .result {
            border: 1px solid #ccc;
            border-radius: 10px; /* Add rounded corners */
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9; /* Light gray background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }

        .result p {
            margin: 5px 0; /* Adjust paragraph margins */
        }

        .results {
            margin-top: 20px;
        }

        .no-results {
            font-style: italic;
            color: #999;
        }

        .section {
            margin-bottom: 40px; /* Add some space between sections */
        }

        h2 {
            color: #333; /* Darker heading color */
        }

        .container {
            padding: 20px; /* Add padding to the container */
            background-color: (255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px; /* Add rounded corners to the container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }


    </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="./wedding.php">Home</a>
        <a href="./reviews.html">Reviews</a>
        <a href="./venues.php">Venues</a>
        <a href="./portfolio.html">Portfolio</a>
        <a href="./contactus.html">Contact</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

    <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "100%";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <header class="header">
    <h1 class="h1">Divine Devotion</h1>
    
</header>
    <h1>Venues</h1>

    <div class="container">
    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
    <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4">
    </video>
       

<!-- Search by Capacity -->
<section class="section" id="capacity-search">
    <h2>Search by Capacity</h2>
    <div class="form-container">
        <form method="POST">
            <label for="capacity">Select Capacity:</label>
            <select name="capacity" id="capacity">
                <option value="50">Up to 200 Guests</option>
                <option value="150">Up to 400 Guests</option>
                <option value="100">Up to 600 Guests</option>
                <option value="150">Up to 800 Guests</option>
                <option value="150">Up to 1000 Guests</option>
                <!-- Add more options as needed -->
            </select>
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="results">
        <?php
        // Step 1: Sending an SQL request from PHP script to the server
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["capacity"])) {
        //Store server, user, and db name and password in SEPERATE FILE for SAFETY!
        $servername = "sci-mysql.lboro.ac.uk";
        $username = "coa123wuser";
        $password = "grt64dkh!@2FD";
        $dbname = "coa123wdb";
        // Connect to the MySQL database
        $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
       

        // Sanitize input
        $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);

        // Step 2: Receiving the SQL request on the server's operating system and passing it to the DBMS
        // Construct SQL query
        $tablenames = "venue";
        $sql = "SELECT * FROM $tablenames WHERE capacity >= $capacity";

        // Step 3: Parsing and optimizing the SQL request in the database management system (DBMS)
        
        // Step 4: Executing the SQL request against the database in the DBMS
        $result = mysqli_query($conn, $sql);
        
        // Step 5: Generating a response that includes the results of the SQL request (by DBMS)
        // Display search results
        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Results:</h3>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='result'>";
                echo "<p>Venue ID: " . $row["venue_id"] . "</p>";
                echo "<p>Name: " . $row["name"] . "</p>";
                echo "<p>Capacity: " . $row["capacity"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }

        // Step 6: Sending the response back (by the server's operating system ) to the PHP script
        // Close connection
        mysqli_close($conn);
    }
        ?>
    </div>
</section>

<!-- Search by Date Availability -->
<section class="section" id="date-search">
    <h2>Search by Date Availability</h2>
    <div class="form-container">
        <form method="POST">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date">
            <input type="submit" value="Search">
        </form>
    </div>
    <?php
    // Step 1: Sending an SQL request from PHP script to the server
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"])) {
        // Connect to the MySQL database
        $conn = mysqli_connect("sci-mysql.lboro.ac.uk", "coa123wuser", "grt64dkh!@2FD", "coa123wdb");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize input
        $date = mysqli_real_escape_string($conn, $_POST["date"]);

        // Step 2: Receiving the SQL request on the server's operating system and passing it to the DBMS
        // Construct SQL query
        
        
        $sql = "SELECT venue_booking.*, venue.name AS venue_name 
                FROM venue_booking 
                INNER JOIN venue ON venue_booking.venue_id = venue.venue_id
                WHERE venue_booking.booking_date = '$date'";
        
        // Step 3: Parsing and optimizing the SQL request in the database management system (DBMS)
        
        // Step 4: Executing the SQL request against the database in the DBMS
        $result = mysqli_query($conn, $sql);

        // Step 5: Generating a response that includes the results of the SQL request (by DBMS)
        // Display search results
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='results'>";
            echo "<h3>Results:</h3>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='result'>";
                echo "<p class='venue-id'>Venue ID: " . $row["venue_id"] . "</p>";
                echo "<p class='venue-name'>Venue Name: " . $row["venue_name"] . "</p>";
                echo "<p class='date'>Date: " . $row["booking_date"] . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='no-results'>No results found.</p>";
        }

        // Step 6: Sending the response back (by the server's operating system ) to the PHP script
        // Close connection
        mysqli_close($conn);
    }
    ?>
</section>

<!-- Search by Catering Grade -->
<section class="section" id="catering-grade-search">
    <h2>Search by Catering Grade</h2>
    <div class="form-container">
        <form method="POST">
            <label for="catering-grade">Select Catering Grade:</label>
            <select name="catering_grade" id="catering-grade">
                <option value="1">Grade 1</option>
                <option value="2">Grade 2</option>
                <option value="3">Grade 3</option>
                <!-- Add more options as needed -->
            </select>
            <input type="submit" value="Search">
        </form>
    </div>
    <?php
    // Step 1: Sending an SQL request from PHP script to the server
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["catering_grade"])) {
        // Connect to the MySQL database
        $conn = mysqli_connect("sci-mysql.lboro.ac.uk", "coa123wuser", "grt64dkh!@2FD", "coa123wdb");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize input
        $catering_grade = mysqli_real_escape_string($conn, $_POST["catering_grade"]);

        // Step 2: Receiving the SQL request on the server's operating system and passing it to the DBMS
        // Construct SQL query
        $sql = "SELECT catering.venue_id, venue.name AS venue_name, catering.grade 
                FROM catering 
                INNER JOIN venue ON catering.venue_id = venue.venue_id
                WHERE catering.grade = '$catering_grade'";

        // Step 3: Parsing and optimizing the SQL request in the database management system (DBMS)
        
        // Step 4: Executing the SQL request against the database in the DBMS
        $result = mysqli_query($conn, $sql);

        // Step 5: Generating a response that includes the results of the SQL request (by DBMS)
        // Display search results
        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Results:</h3>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='result'>";
                echo "<p>Venue ID: " . $row["venue_id"] . "</p>";
                echo "<p>Venue Name: " . $row["venue_name"] . "</p>";
                echo "<p>Grade: " . $row["grade"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }

        // Step 6: Sending the response back (by the server's operating system ) to the PHP script
        // Close connection
        mysqli_close($conn);
    }
    ?>
</section>

<!-- Additional section for displaying venue details -->
<section class="section" id="venue-details">
    <h2>Venue Costs</h2>
    <div class="form-container">
        <form method="POST">
            <label for="venue">Select Venue:</label>
            <select name="venue" id="venue">
                <!-- Fetch venues from the database and populate the dropdown -->
                <?php
                // Connect to the MySQL database
                $conn = mysqli_connect("sci-mysql.lboro.ac.uk", "coa123wuser", "grt64dkh!@2FD", "coa123wdb");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Construct SQL query to fetch all venues
                $venues_sql = "SELECT * FROM venue";
                $venues_result = mysqli_query($conn, $venues_sql);

                // Populate dropdown with venue options
                while ($row = mysqli_fetch_assoc($venues_result)) {
                    echo "<option value='" . $row['venue_id'] . "'>" . $row['name'] . "</option>";
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </select>
            <input type="submit" value="Show Details">
        </form>
    </div>
    <?php
    // Step 1: Sending an SQL request from PHP script to the server
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["venue"])) {
        // Connect to the MySQL database
        $conn = mysqli_connect("sci-mysql.lboro.ac.uk", "coa123wuser", "grt64dkh!@2FD", "coa123wdb");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize input
        $venue_id = mysqli_real_escape_string($conn, $_POST["venue"]);

        // Step 2: Receiving the SQL request on the server's operating system and passing it to the DBMS
        // Construct SQL query to fetch venue details based on selected venue ID
        $venue_details_sql = "SELECT * FROM venue WHERE venue_id = '$venue_id'";
        $venue_details_result = mysqli_query($conn, $venue_details_sql);

        // Step 3: Parsing and optimizing the SQL request in the database management system (DBMS)
        
        // Step 4: Executing the SQL request against the database in the DBMS

        // Step 5: Generating a response that includes the results of the SQL request (by DBMS)
        // Display venue details
        if (mysqli_num_rows($venue_details_result) > 0) {
            echo "<h3>Venue Details:</h3>";
            echo "<table>";
            echo "<tr><th>Venue ID</th><th>Name</th><th>Weekend Price</th><th>Weekday Price</th></tr>";
            while ($row = mysqli_fetch_assoc($venue_details_result)) {
                echo "<tr>";
                echo "<td>" . $row["venue_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["weekend_price"] . "</td>";
                echo "<td>" . $row["weekday_price"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No details found for the selected venue.</p>";
        }

        // Step 6: Sending the response back (by the server's operating system ) to the PHP script
        // Close connection
        mysqli_close($conn);
    }
    ?>
</section>



    </div>
</body>
</html>
