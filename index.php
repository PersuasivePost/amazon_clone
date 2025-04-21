<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Amazon</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="images/amazonlogo.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="nav-logo border">
                    <div class="logo"></div>
                </div>
                
                <div class="nav-address border">
                    <p class="add-first">Deliver to</p>
                    <div class="add-icon">
                        <i class="fa-solid fa-location-dot"></i>
                        <p class="add-sec">India</p>
                    </div>
                </div>

                <div class="nav-search">
                    <select class="search-select">
                        <option>All</option>
                    </select>
                    <input placeholder="Search Amazon" class="search-input">
                    <div class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="language border">
                        <i class="fa-solid fa-flag-usa"></i>
                        <strong>EN</strong>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
                        <!-- Profile Picture Upload Section -->
                 <div class="nav-profile border">
               <form action="upload_profile.php" method="post" enctype="multipart/form-data">
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" />
                <button type="submit">Upload</button>
            </form>
               </div>

                        <!-- Profile Picture Upload Section -->
            <div class="nav-profile border">
                <!-- Upload Button and Profile Image -->
                <form action="upload_profile.php" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center;">
                    <input type="file" name="Select_file" id="profile_picture" accept="image/*" style="display: none;" />
                    <label for="profile_picture" class="upload-btn" style="cursor: pointer; margin-right: 10px;"></label>
                    
                    <!-- Display Profile Image if uploaded -->
                    <?php
                        $profile_img_path = 'uploaded/' . (isset($_GET['file']) ? $_GET['file'] : 'default_profile.png');
                    ?>
                    <img id="profile-img" src="<?php echo $profile_img_path; ?>" alt="Profile Image" width="50" height="50" style="border-radius: 50%; object-fit: cover; margin-left: 10px;" />
                </form>
            </div>


            

            <div class="nav-signin border">
    <?php if (isset($_SESSION['user_name'])): ?>
        <p><span>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span></p>
        <p class="nav-second">Account & List</p>
    <?php else: ?>
        <a href="login.php" style="text-decoration: none; color: white;">
            <p><span>Hello, sign in</span></p>
            <p class="nav-second">Account & List</p>
        </a>
    <?php endif; ?>
</div>
                <div class="nav-return border">
                    <p><span>Returns</span></p>
                    <p class="nav-second">& Orders</p>
                </div>
                <div class="nav-cart border">
                    <!-- <a href="add_to_cart.php"></a> -->
                    <a href="view_cart.php" class="nav-cart border" style="text-decoration: none; color: white;">
                    <i class="fa-solid fa-cart-shopping"></i>
                     Cart
                    </a>
                    <!-- <i class="fa-solid fa-cart-shopping"></i>
                    Cart -->
                </div>
            </div>
            <div class="panel">
                <div class="panel-all border">
                    <i class="fa-solid fa-bars"></i>
                    All
                </div>
                <div class="panel-ops">
                    <p>Today's Deals</p>
                    <p>Customer Service</p>
                    <p>Registry</p>
                    <p>Gift Cards</p>
                    <p>Sell</p>
                </div>
                <div class="panel-deals border">
                    Shop deals in Electronics
                </div>
            </div>
        </header>
        <div class="hero-section">
            <div class="hero-message">
                <p>You are on amazon.com. You can also shop on amazon.in for millions of products with fast local delivery. <a href="https://www.amazon.in/" target="blank">Click here</a> to go to amazon.in</a></p>
            </div>
        </div>

        <!--  -->
        <div class="shop-section">
    <a href="clothes.php" style="text-decoration: none; color: inherit;">
        <div class="box1 box">
            <div class="box-content">
                <h2>Clothes</h2>
                <div class="box-img" style="background-image: url('images/box1_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="furniture.php" style="text-decoration: none; color: inherit;">
        <div class="box3 box">
            <div class="box-content">
                <h2>Furniture</h2>
                <div class="box-img" style="background-image: url('images/box3_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="mobiles.php" style="text-decoration: none; color: inherit;">
        <div class="box4 box">
            <div class="box-content">
                <h2>Mobiles</h2>
                <div class="box-img" style="background-image: url('images/box4_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="beauty.php" style="text-decoration: none; color: inherit;">
        <div class="box5 box">
            <div class="box-content">
                <h2>Beauty</h2>
                <div class="box-img" style="background-image: url('images/box5_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="pets.php" style="text-decoration: none; color: inherit;">
        <div class="box6 box">
            <div class="box-content">
                <h2>Pets</h2>
                <div class="box-img" style="background-image: url('images/box6_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="jewellery.php" style="text-decoration: none; color: inherit;">
        <div class="box8 box">
            <div class="box-content">
                <h2>Jewellery</h2>
                <div class="box-img" style="background-image: url('images/box8_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>
  
    <a href="health.php" style="text-decoration: none; color: inherit;">
        <div class="box2 box">
            <div class="box-content">
                <h2>Health & Personal Care</h2>
                <div class="box-img" style="background-image: url('images/box2_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>

    <a href="accessories.php" style="text-decoration: none; color: inherit;">
        <div class="box7 box">
            <div class="box-content">
                <h2>Accessories</h2>
                <div class="box-img" style="background-image: url('images/box7_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
    </a>
</div>



        <footer>
            <div class="foot-panel1">
                Back To Top
            </div>
            <div class="foot-panel2">
                <ul>
                    <p>Get to Know Us</p>
                    <a>Careers</a>
                    <a>Blog</a>
                    <a>About Amazon</a>
                    <a>Investor Relations</a>
                    <a>Amazon Devices</a>
                    <a>Amazon Science</a>
                </ul>
                <ul>
                    <p>Get to Know Us</p>
                    <a>Careers</a>
                    <a>Blog</a>
                    <a>About Amazon</a>
                    <a>Investor Relations</a>
                    <a>Amazon Devices</a>
                    <a>Amazon Science</a>
                </ul>
                <ul>
                    <p>Get to Know Us</p>
                    <a>Careers</a>
                    <a>Blog</a>
                    <a>About Amazon</a>
                    <a>Investor Relations</a>
                    <a>Amazon Devices</a>
                    <a>Amazon Science</a>
                </ul>
                <ul>
                    <p>Get to Know Us</p>
                    <a>Careers</a>
                    <a>Blog</a>
                    <a>About Amazon</a>
                    <a>Investor Relations</a>
                    <a>Amazon Devices</a>
                    <a>Amazon Science</a>
                </ul>
            </div>
            <div class="foot-panel3">
                <div class="logo"></div>
            </div>
            <div class="foot-panel4">
                <div class="pages">
                    <a>Conditions of use</a>
                    <a>Privacy Notice</a>
                    <a>Your Ads Privacy Notice</a>
                </div>
                <div class="copyright">
                    © 1996-2024, Amazon.com, Inc. or its affiliates
                </div>
            </div>
        </footer>
    </body>
</html>

