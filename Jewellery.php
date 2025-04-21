<?php
$jewellery = [
  [
    "brand" => "Voylla",
    "title" => "Oxidized Silver Plated Jhumka Earrings for Women",
    "rating" => round(4.3), 
    "reviews" => "3,987",
    "bought" => "800+ bought in past month",
    "price" => 349,
    "mrp" => 799,
    "discount" => 450,
    "del1" => "Monday, 22 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/61kshx2wDhL._SY695_.jpg",
  ],
  [
    "brand" => "Yellow Chimes",
    "title" => "Rose Gold-Plated Adjustable Bracelet for Women & Girls",
    "rating" => round(4.8), 
    "reviews" => "6,122",
    "bought" => "1.2K+ bought in past month",
    "price" => 499,
    "mrp" => 999,
    "discount" => 500,
    "del1" => "Tuesday, 23 April",
    "del2" => "Sunday, 21 April",
    "img" => "https://m.media-amazon.com/images/I/312PnwY4OIL.jpg",
  ],
  [
    "brand" => "Peora",
    "title" => "Gold Plated Stone Studded Kada Bangle Set",
    "rating" => round(4.2), 
    "reviews" => "2,564",
    "bought" => "600+ bought in past month",
    "price" => 1299,
    "mrp" => 1999,
    "discount" => 700,
    "del1" => "Sunday, 21 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/8134oOHFLNL._SY695_.jpg",
  ],
  [
    "brand" => "YouBella",
    "title" => "Traditional Gold Plated Necklace Set with Earrings for Women",
    "rating" => round(4.4), 
    "reviews" => "4,201",
    "bought" => "1K+ bought in past month",
    "price" => 699,
    "mrp" => 1399,
    "discount" => 700,
    "del1" => "Monday, 22 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/71EApUovk1L._SY695_.jpg",
  ],
  [
    "brand" => "Tanishq",
    "title" => "18K Yellow Gold Stud Earrings for Women",
    "rating" => round(4.6), 
    "reviews" => "1,356",
    "bought" => "300+ bought in past month",
    "price" => 12999,
    "mrp" => 14999,
    "discount" => 2000,
    "del1" => "Saturday, 20 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/51oiXPvhE1L._SY695_.jpg",
  ],
  [
    "brand" => "Zaveri Pearls",
    "title" => "Sterling Silver Cubic Zirconia Pendant Necklace for Women",
    "rating" => round(4.1),  
    "reviews" => "2,245",
    "bought" => "550+ bought in past month",
    "price" => 749,
    "mrp" => 1499,
    "discount" => 750,
    "del1" => "Monday, 22 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/51SHXYRHa8L._SY695_.jpg"
  ],
  [
    "brand" => "CaratLane",
    "title" => "Diamond Solitaire Ring in 18K Yellow Gold",
    "rating" => round(4.9), 
    "reviews" => "3,526",
    "bought" => "1K+ bought in past month",
    "price" => 24999,
    "mrp" => 29999,
    "discount" => 5000,
    "del1" => "Sunday, 21 April",
    "del2" => "Tomorrow, 19 April",
    "img" => "https://m.media-amazon.com/images/I/61QjeDgbm2L._SY625_.jpg",
  ],
  [
    "brand" => "Mia by Tanishq",
    "title" => "Gold Plated Earrings with Enamel Work for Women",
    "rating" => round(4.7),  
    "reviews" => "1,122",
    "bought" => "450+ bought in past month",
    "price" => 9799,
    "mrp" => 11199,
    "discount" => 400,
    "del1" => "Tuesday, 23 April",
    "del2" => "Monday, 22 April",
    "img" => "https://m.media-amazon.com/images/I/41LEM4jpSvL._SY695_.jpg",
  ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Clothes – Amazon Clone</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e3e6e6;
    }
    header {
      background-color: #232f3e;
      color: white;
      padding: 15px 30px;
      font-size: 20px;
      font-weight: bold;
    }
    .container {
      padding: 20px;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }
    .product-card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.2s ease;
    }
    .product-card:hover {
      transform: scale(1.02);
    }
    .product-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }
    .product-info {
      padding: 10px;
      text-align: left;
    }
    .brand {
      font-weight: bold;
      margin: 5px 0 2px;
    }
    .title {
      font-size: 14px;
      margin: 2px 0 6px;
    }
    .rating {
      color: #FFA41C;
      font-size: 14px;
      margin-bottom: 4px;
    }
    .bought {
      font-size: 12px;
      color: #007600;
      margin-bottom: 6px;
    }
    .price {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 6px;
    }
    .price del {
      font-weight: normal;
      color: #555;
      margin-left: 6px;
    }
    .delivery {
      font-size: 12px;
      color: #555;
      line-height: 1.4;
      margin-bottom: 8px;
    }
    .add-btn {
  background-color: #f0c14b;
  color: black;
  border: 1px solid #a88734;
  border-radius: 4px;
  padding: 8px 0;
  font-weight: bold;
  cursor: pointer;
  text-align: center;
  margin: 0 auto; 
  display: block;
  width: 80%; 
}

    footer {
      background-color: #232f3e;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 30px;
      font-size: 12px;
    }
  
    .nav-logo {
  height: 50px;
  width: 100px; 
  display: flex;
  align-items: center;
}

.amazon-logo {
  max-height: 100%;
  max-width: 100%;
  object-fit: contain;
}


  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
  <div class="navbar">
  <div class="nav-logo border">
  <a href="index.php">
    <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Emblem.jpg" alt="Amazon Logo" class="amazon-logo">
  </a>
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
    </div>

    <div class="nav-signin border">
      <p><span>Hello, sign in</span></p>
      <p class="nav-second">Account & Lists</p>
    </div>

    <div class="nav-return border">
      <p><span>Returns</span></p>
      <p class="nav-second">& Orders</p>
    </div>

    <a href="view_cart.php" class="nav-cart border" style="text-decoration: none; color: white;">
      <i class="fa-solid fa-cart-shopping"></i> Cart
    </a>
  </div>

  <div class="panel">
    <div class="panel-all border">
      <i class="fa-solid fa-bars"></i>
      All
    </div>
    <div class="panel-ops">
      <a href="index.php"><p>Home</p></a>
      <a href="Furniture.php"><p>Jewellery</p></a>
      <p>Customer Service</p>
      <p>Registry</p>
      <p>Gift Cards</p>
      <p>Sell</p>
    </div>
    <div class="panel-deals border">
      Shop deals in Jewellery
    </div>
  </div>
</header>
</body>

<title>Jewellery– Amazon Clone</title>


<div class="container">
  <h2 style="text-align:center; margin-bottom:20px;">JewelleryProducts</h2>
  <div class="product-grid">
    <?php foreach ($jewellery as $f): ?>
      <div class="product-card">
        <img src="<?= $f['img'] ?>" alt="<?= htmlspecialchars($f['title']) ?>">
        <div class="product-info">
          <div class="brand"><?= htmlspecialchars($f['brand']) ?></div>
          <div class="title"><?= htmlspecialchars($f['title']) ?></div>
          <div class="rating">
            <?php
              $fullStars = floor($f['rating']);
              $halfStar = ($f['rating'] - $fullStars) >= 0.5;
              $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
              for ($i = 0; $i < $fullStars; $i++) echo '★';
              if ($halfStar) echo '½';
              for ($i = 0; $i < $emptyStars; $i++) echo '☆';
            ?>
            <?= $f['reviews'] ?>
          </div>
          <div class="bought"><?= htmlspecialchars($f['bought']) ?></div>
          <div class="price">
            ₹<?= number_format($f['price']) ?>
            <del>₹<?= number_format($f['mrp']) ?></del>
            <?php
              $discountPercent = round(($f['discount'] / $f['mrp']) * 100);
              echo "($discountPercent% off)";
            ?>
          </div>
          <div class="delivery">
            FREE delivery <?= htmlspecialchars($f['del1']) ?> on first order<br>
            Or fastest delivery <?= htmlspecialchars($f['del2']) ?>
          </div>
          <button class="add-btn">Add to Cart</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<footer>
  © 2025 Amazon Clone. All rights reserved.
</footer>
<script>
    document.querySelectorAll('.add-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const card = btn.closest('.product-card');
        const name  = card.dataset.name;
        const price = card.dataset.price;
        const qty   = 1;

        fetch('add_to_cart.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          body: `product_name=${encodeURIComponent(name)}&price=${price}&quantity=${qty}`
        })
        .then(res => res.text())
        .then(msg => alert(msg))
        .catch(err => console.error(err));
      });
    });
</script>

</body>
</html>

