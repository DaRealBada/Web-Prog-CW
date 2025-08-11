// Fetch chart data and display chart
function fetchChartData() {
    var venueName = document.getElementById("venueSelect").value;
    var canvasElement = document.getElementById("venueChart");
    document.getElementById('newUserBtn').addEventListener('click', () => alert('New user added!'));

    // AJAX request to fetch review data
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var reviewSums = JSON.parse(this.responseText);
            updateChart(canvasElement, reviewSums);
        }
    };
    xhttp.open("GET", "reviews.php?venue=" + encodeURIComponent(venueName), true);
    xhttp.send();
}
