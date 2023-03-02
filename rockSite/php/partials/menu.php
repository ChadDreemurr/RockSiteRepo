<?php include('../config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Peace, Love, and Dots site page showcasing magnificent painted rocks">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="../scripts/menuClick.js"></script>
    <title>Peace, Love, & Dots</title>
</head> 
<body style="background-color:#F8E2C4; margin: 0 0;">  <!-- Background color-->

<div class="navbar">
    <img src="../images/rockdudes_banner.png" alt="Heart Rock in cornner with company motto 'peace love and dots' next to it" class="banner">
    <div class="navlinks">
        <a href="home.php">Home</a>
        <a href="products.php">Shop</a>
        <a href="about.php">About</a>
    </div>

    <div class="menu">
        <div class="menu-lines">
            <div class="three-line-menu" onclick="menuClick()">
                <div class="tlm-line"></div>
                <div class="tlm-line"></div>
                <div class="tlm-line"></div>
            </div>
            <div id="dropdown" class="dropdown-content">
                <img src="../images/icons/homeicon.png" class="dropdown-img">
                <a href="home.php">Home</a>
                <img src="../images/icons/shopicon.png" class="dropdown-img">
                <a href="products.php">Shop</a>
                <img src="../images/icons/abouticon.png" class="dropdown-img">
                <a href="about.php">About</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
