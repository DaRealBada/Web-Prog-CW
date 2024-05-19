<?php
$servername = "sci-mysql.lboro.ac.uk";
$username = "coa123wuser";
$password = "grt64dkh!@2FD";
$dbname = "coa123wdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an array to store the review sums for each score for each venue
$reviewSums = array();

// SQL query to fetch all venue names
$sql = "SELECT DISTINCT v.venue_id, v.name FROM venue v INNER JOIN venue_review_score vs ON v.venue_id = vs.venue_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each venue
    while($row = $result->fetch_assoc()) {
        $venueId = $row["venue_id"];
        $venueName = $row["name"];
        
        // Initialize an array to store the sums for each score for the current venue
        $venueSums = array_fill(1, 10, 0);
        
        // SQL query to fetch the sums for each score for the current venue
        $sql = "SELECT score, COUNT(*) AS count FROM venue_review_score WHERE venue_id = '$venueId' GROUP BY score";
        $scoreResult = $conn->query($sql);
        
        if ($scoreResult->num_rows > 0) {
            // Loop through each score for the current venue
            while($scoreRow = $scoreResult->fetch_assoc()) {
                $score = intval($scoreRow["score"]);
                $count = intval($scoreRow["count"]);
                $venueSums[$score] = $count;
            }
        }
        
        // Store the sums for the current venue in the main array
        $reviewSums[$venueName] = $venueSums;
    }
}

// Close connection
$conn->close();

// Return review sums as JSON
echo json_encode($reviewSums);
?>
