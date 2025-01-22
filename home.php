<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}
if(isset($_GET['id'])){//view_pdf.php
    $product_id = $_GET['id'];
  
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');
  
    if(mysqli_num_rows($select_product) > 0){
      $fetch_product = mysqli_fetch_assoc($select_product);
      $pdf_path = 'uploaded_pdfs/'.$fetch_product['pdf'];  // Construct the PDF path
  
      if(file_exists($pdf_path)){
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="'.$fetch_product['name'].'.pdf"');
        readfile($pdf_path);
        exit;
      }else{
        echo '<p>Error: PDF file not found!</p>';
      }
    }else{
      echo '<p>Error: Invalid product ID!</p>';
    }
  }else{
    echo '<p>Error: Missing product ID!</p>';
  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/main.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>بوابتك لعالم المعرفة</h3>
      <p>القراءة اصبحت اسهل الان ............عالم من المعرفة ينتظرك</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">

    <h1 class="title">الكتب الموضافة  مؤخرا</h1>

<div class="box-container">

<?php
  $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
  if(mysqli_num_rows($select_products) > 0){
    while($fetch_products = mysqli_fetch_assoc($select_products)){
?>
  <form action="" method="post" class="box">
  <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
  <div class="name"><?php echo $fetch_products['name']; ?></div>
  <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
  <input type="number" min="1" name="product_quantity" value="1" class="qty">
  <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
  <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
  <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
  <a href="view_pdf_iframe.php?id=<?php echo $fetch_products['id']; ?>" class="option-btn">View PDF</a>
</form>

<?php
    }
  }else{
    echo '<p class="empty">no products added yet!</p>';//view_pdf.php
  }
?>

</div>

<div class="load-more" style="margin-top: 2rem; text-align:center">
    <a href="shop.php" class="option-btn">اضغط للمزيد</a>
</div>

</section>

<section class="about">

    <div class="flex">

    <div class="image">
        <img src="images/Ebook-pana.svg" alt="">
    </div>

    <div class="content">
        <h3>من نحن</h3>
        <p>بير مديو (per medu - بيت الكتب بالمصرية القديمة)
            هو موقع لقراءة ملخصات الكتب و شراء الكتب 
        </p>
        <a href="about.php" class="btn">اقراء للمزيد</a>
    </div>
</div>

</section>


<section class="home-contact">

<div class="content">
    <h3>هل لديك اى اسالة ؟</h3>
    <p>لاى اسالة يمكنك التواصل معنا بارسال رسالة</p>
    <a href="contact.php" class="white-btn">تواصل معنا </a>
</div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>