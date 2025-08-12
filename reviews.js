// This script is now integrated into the HTML file.
// For a multi-page application, you would keep this separate.

// Example of how a separate file would look:

document.addEventListener('DOMContentLoaded', () => {

    let myChart = null; // Variable to hold the chart instance

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    async function fetchChartData() {
        const chartWrapper = document.getElementById('chart-wrapper');
        try {
            // Using modern fetch API with async/await
            const response = await fetch("reviews.php");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const reviewSums = await response.json();
            
            // Trigger animation
            chartWrapper.classList.add('visible');
            
            // Render chart after animation starts
            setTimeout(() => {
                updateChart(reviewSums);
            }, 300);

        } catch (error) {
            console.error("Could not fetch chart data:", error);
            // You could display a user-friendly error message here
        }
    }

    function updateChart(data) {
        const canvasElement = document.getElementById("venueChart");
        const ctx = canvasElement.getContext('2d');
        
        // Destroy existing chart if it exists for re-rendering
        if (myChart) {
            myChart.destroy();
        }

        const venues = Object.keys(data);
        const scores = Object.keys(data[venues[0]]);
        const datasets = [];
        
        const chartColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

        scores.forEach((score, index) => {
            const scoresData = venues.map(venue => data[venue][score]);
            const color = chartColors[index % chartColors.length];

            datasets.push({
                label: `Score of ${score}`,
                data: scoresData,
                backgroundColor: color.replace(')', ', 0.6)').replace('rgb', 'rgba'),
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color.replace(')', ', 0.8)').replace('rgb', 'rgba'),
                hoverBorderWidth: 3
            });
        });

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: venues,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: true,
                    text: 'Venue Ratings Distribution',
                    fontSize: 24,
                    fontFamily: "'Playfair Display', serif",
                    fontColor: '#333'
                },
                legend: {
                    position: 'top',
                    labels: {
                        fontFamily: "'Lato', sans-serif",
                        fontSize: 14
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0,
                            fontStyle: 'bold',
                            fontFamily: "'Lato', sans-serif"
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Number Of Reviews Per Score',
                            fontSize: 18,
                            fontStyle: 'italic',
                            fontFamily: "'Lato', sans-serif"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontStyle: 'bold',
                            fontFamily: "'Lato', sans-serif"
                        }
                    }]
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            let label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += tooltipItem.yLabel;
                            return label;
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }
    
    // Attach event listeners
    document.getElementById('displayChartButton').addEventListener('click', fetchChartData);
    document.querySelector('.menu-opener').addEventListener('click', openNav);
    document.querySelector('.closebtn').addEventListener('click', closeNav);
});
