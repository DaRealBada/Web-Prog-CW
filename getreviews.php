<?php
// Database connection
$servername = "sci-mysql.lboro.ac.uk";
$username = "coa123wuser";
$password = "grt64dkh!@2FD";
$dbname = "coa123wdb";

// Check if the 'name' parameter is set in the GET request
if (!isset($_GET['name'])) {
    // 'name' parameter is not set, return a 400 Bad Request error
    http_response_code(400);
    exit("Error: 'name' parameter is missing");
}

// Get the selected venue name from the AJAX request
$selectedVenue = $_GET['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Connection failed, return a 500 Internal Server Error
    http_response_code(500);
    exit("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch review data for the selected venue
$sql = "SELECT score, COUNT(*) as count FROM venue_review_score WHERE name = '$selectedVenue' GROUP BY score";
$result = $conn->query($sql);

$reviewSums = array();

if ($result) {
    // Query executed successfully, fetch the review data
    while ($row = $result->fetch_assoc()) {
        $reviewSums[$row["score"]] = $row["count"];
    }
} else {
    // Query failed, return a 500 Internal Server Error
    http_response_code(500);
    exit("Error: " . $conn->error);
}

// Close connection
$conn->close();

// Return review data as JSON
echo json_encode($reviewSums);
?>
