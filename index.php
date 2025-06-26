<!-- index.php -->
<?php include 'template/header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <style>
    /* CSS for title animation */
    .title-container {
      text-align: center;
      margin-top: 50px;
      opacity: 0;
      animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    /* Basic CSS for card layout */
    .card-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjust column width as needed */
      gap: 30px; /* Adjust gap between cards */
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 5px;
      transition: transform 0.3s ease;
      
      background-color: #f9f9f9;
      font-family: Arial, sans-serif; /* Change font-family */
    }

    .card img {
    width: 338px; /* Make the image fill the entire width of the card */
    height: 232px; /* Let the height adjust proportionally based on the width */
    display: block; /* Ensure the image behaves as a block element */
    transition: transform 0.3s ease; /* Add a smooth transition effect */
}
    .card-content {
      padding: 15px;
      transition: background-color 0.3s ease;
    }


    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333; /* Change title font color */
    }

    .card-description {
      font-size: 14px;
      color: #555; /* Change description font color */
    }

    /* Button styling */
    button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-family: Arial, sans-serif; /* Change font-family */
    }

    button:hover {
      background-color: #45a049; /* Darker green on hover */
    }

    /* Hover effect */
    .card:hover {
      transform: scale(1.05);
    }

    
  </style>
  <body>
    
    <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate">
              <h1 class="mb-3">AgroLink Growing Dreams Harvesting Success</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('images/bg_2.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate">
            <h1 class="mb-3">Empowering Farmers, Enriching Lives</h1> 
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate">
            <h1 class="mb-3">Connecting Fields to Families</h1> 
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="title-container">
    <h3>View Products</h3><hr/>
  </div>
  <div class="container mt-3 mb-5 card-container">
    <?php $conn = new mysqli("localhost:3306", "root", "", "agrolink_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$products = $conn->query("SELECT p.*,p.id AS p_id, l.location_name AS l_name, f.mobno AS fmobno
FROM tblproducts p
JOIN tblfarmer f ON p.addedbyno = f.id
JOIN tbllocations l ON p.location_id = l.id");
while($row = $products->fetch_assoc()):
?>
    <div class="card">
      <img src="uploads/<?php echo $row['image']; ?>" alt="House Image" class="card-image" >
      <div class="card-content">
        <div class="card-title" style="color: black">Product: <?php echo $row['name']; ?></div>
        <div class="card-description">
          <p><b>Quantity:</b> <?php echo $row['quantity']; ?> Kg<br/>
          <b>Price:</b> Rs. <?php echo $row['price']; ?> Per Kg<br/>
          <b>Description:</b>  <?php echo $row['description']; ?><br/>
          
          <b>Seller Name:</b>  <?php echo $row['addedby']; ?><br/>
          
          <b>Contact No:</b>  <?php echo $row['fmobno']; ?><br/>
         <b>Address:</b> <?php echo ucwords($row['address'] .", ".$row['l_name']); ?><br/>
        </div>
        <button onclick="alert('Need to Login First')" >Buy Now</button>
        
      </div>
    </div> <?php endwhile; ?>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- END slider -->
<!--  -->


    <!-- <section class="ftco-section bg-light">
      <div class="container special-dish"> 
           
            <h3 style="text-align: center;">Our Specialties</h3> 
            Usually, we're all about getting out more. But these are unprecedented times. <br/>

We intend to do everything we can to support our restaurant partners in what is an extremely challenging time for the industry. Please remember that supporting restaurants does not necessarily mean dining out right now, and we would encourage our users to look out for any opportunity to do this - whether that is through buying vouchers to use at a later date, or ordering delivery. If you choose to spread the word on social media around how you’re supporting restaurants, please do let us know and we’ll continue to amplify these messages wherever we’re able.<br/>

We will of course continue to monitor the situation, and adapt as quickly and as sensitively as possible. In terms of our social media and email, you won’t hear the same messaging from us that you’re used to. Right now, we’re solely focused on what’s best for both diners and restaurants.<br/>

You can access the most up to date information surrounding COVID-19 via the World Health Organization, as well as the government's website. We’d urge our entire dining community to keep themselves informed at this time. 
      </div>
    </section> -->


  <?php //include 'template/instagram.php'; ?>

  <?php include 'template/footer.php'; ?>


  <?php include 'template/script.php'; ?>
  
  <script src="dashboard/assets/vendor/jquery/jquery.js"></script>
  <script src="dashboard/assets/vendor/select2/select2.js"></script>
  <script src="dashboard/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    
  </body>
</html>