<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Services</title>
    <link rel="stylesheet" href="navbarexample.css">
    <link rel="stylesheet" href="wedding.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet"> 
    <style>
        
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
            text-align: center;
        }
        
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        
        .sidenav a:hover {
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
            .sidenav { padding-top: 15px; }
            .sidenav a { font-size: 18px; }
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

    <section class="theservices">
        <div class="slideshow-container" id="slideshow1">
            <img class="slides" src="aisle.jpg" alt="Scared Happily">
            <img class="slides" src="roses.png" alt="Sad sanity">
            <img class="slides" src="red.avif" alt="Slide 3">
            
            <!-- Add more images as needed -->
            <h1 class="slide-text">Divine Devotion</h1>
        </div>
        <!-- First Text Section -->
        <div class="planning service-card">
            <h1 class="service-title">"Dazzling Occasions
              Elegant and Everlasting Creations
              Unforgettable Moments
              Crafting Exclusive Luxury Events Worldwide"</h1>
        </div>

        <!-- First Image Section -->
        <div class="img-cover">
            <div class="flex-container img-container">
                <div>
                    <img class="img-1" src="private.png" alt="Image 2">
                </div>
                <div>
                    <img class="img-1" src="panto.png" alt="Image 2">
                </div>
                <div>
                    <img class="img-1" src="chuckles.png" alt="Image 2">
                </div>
            </div>
        </div>

        <!-- Third Image Section -->
        <div class="slideshow-container" id="slideshow3">
            <img class="slides" src="daniel.jpg" alt="Image 4">
            <!-- Add more images as needed -->
            <h1 class="slide-text">Portfolio</h1>
        </div> 

        <!-- Third Text Section -->
        <div class="catering service-card">
            <a href="./portfolio.html" class="portfolio-link">
                <h2 class="service-title">PORTFOLIO</h2>
            </a>
            <p class="service-description">. Step into a world of unforgettable moments crafted by Divine Devotion's expert team. Our portfolio of private events showcases the pinnacle of meticulous planning and impeccable execution, whether it's a dreamy wedding celebration or a lively party to remember. Each event is a testament to our commitment to excellence, where every detail is thoughtfully curated to reflect your unique style and personality.

From enchanting weddings that capture the essence of romance to vibrant parties pulsating with energy and joy, our portfolio embodies the diverse spectrum of occasions we specialize in. Whether you envision an intimate gathering or a grand affair, our experienced planners are dedicated to bringing your vision to life. Let Divine Devotion be your partner in creating moments that will be cherished for a lifetime..</p>
        </div>
        <!-- Fourth Image Section -->
        <div class="slideshow-container" id="slideshow3">
            <img class="slides" src="mohamed.webp" alt="Image 4">
            <!-- Add more images as needed -->
            <h1 class="slide-text">Venues</h1>
        </div> 

        <!-- Fourth Text Section -->
        <div class="catering service-card">
            <a href="./venues.php" class="portfolio-link">
                <h2 class="service-title">Venues</h2>
            </a>
            <p class="service-description">.  on a journey through Divine Devotion's diverse array of available venues, each offering its own unique ambiance and charm. Dive into our curated collection of options, where every venue holds the promise of turning your dream wedding into a reality. From rustic countryside retreats to elegant urban settings, our selection spans a spectrum of styles to suit every couple's vision. Discover the perfect backdrop for your special day as you explore the possibilities that await within our carefully vetted venues. With Divine Devotion, finding your ideal wedding venue is just a step away.





</p>
        </div>
        <!-- Fifth Image Section -->
        <div class="slideshow-container" id="slideshow3">
            <img class="slides" src="cooper.jpg" alt="Image 4">
            <!-- Add more images as needed -->
            <h1 class="slide-text">Reviews</h1>
        </div> 

        <!-- Fifth Text Section -->
        <div class="catering service-card">
            <a href="./reviews.html" class="reviews-link">
                <h2 class="service-title">Reviews</h2>
            </a>
            <p class="service-description">. Venture onto your quest for the perfect wedding venue with Divine Devotion's curated reviews. Delve into enchanting narratives and firsthand experiences that illuminate the charm and allure of each location. From intimate gatherings to grand celebrations, our reviews provide a glimpse into the magic that unfolds within these picturesque settings. Let our comprehensive reviews guide you as you navigate through a myriad of options, ensuring that your wedding day is nothing short of extraordinary.

.</p>
        </div>
        
    </section>

    <footer class="footer animated fadeInUp">
        <p>Contact us for more information about our wedding services.</p>
    </footer>

    <script>
    // JavaScript for synchronized slideshow
    function startSlides(slideshowId) {
        let slideIndex = 0;
        if (slideshowId === "slideshow1") {
            showSlides(slideshowId);
        }

        function showSlides(slideshowId) {
            let slides = document.querySelectorAll("#" + slideshowId + " .slides");
            if (slides.length === 0) return; // Check if slides exist

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            if (slideIndex < 1) {slideIndex = slides.length} // Ensure slideIndex is within valid range
            slides[slideIndex-1].style.display = "block";
            setTimeout(() => showSlides(slideshowId), 8000); // Change image every 8 seconds
        }
    }

    // Start slideshow for the first section only
    startSlides("slideshow1");

    // JavaScript for opening and closing side navigation
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</body>
</html>
